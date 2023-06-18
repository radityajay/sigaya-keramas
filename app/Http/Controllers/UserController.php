<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->type == 'datatable') {
            $data = User::with(['position'])->orderBy('created_at');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $action = '';

                    $action .= '<a href="' . route('users.edit', $data->id) . '" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit" style="padding-right: 15px"><i class="ri-edit-2-fill"></i></a>';

                    if($data->is_default == false){
                        $action .= '<a class="text-danger delete-item" data-label="Unit" data-url="' . route('users.destroy', $data->id) . '" data-id="' . $data->id . '" data-bs-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer"><i style="color: red" class="ri-delete-bin-2-fill"></i></a>';
                    }

                    return $action;
                })
                ->editColumn('is_active', function ($data) {
                    if($data->is_active == true){
                        return 'Active';
                    } else{
                        return 'Not Active';
                    }
                })
                ->addColumn('position_name', function ($data) {
                    return $data->position->name ?? '-';
                })
                ->rawColumns(['action', 'position_name'])
                ->make(true);
        }

        return view('pages.user.index', [
            'page_title' => 'User',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Position::all();

        return view('pages.user.form', [
            'page_title' => 'User',
            'position' => $position
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);

        try{
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_active' => $request->is_active == 'true' ? true : false
            ]);

            return redirect()->route('users.index')
                ->with('success', 'User successfully created');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Error on line {$e->getLine()}: {$e->getMessage()}");
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Error on line {$e->getLine()}: {$e->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::with(['position'])->where('id', $id)->first();
        // dd($data);
        //return response()->json($data);
        return view('pages.user.profile', [
            'page_title' => 'Profile',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        $position = Position::all();

        if(!$data){
            abort(404);
        }

        return view('pages.user.form', [
            'page_title' => "Edit {$data->name}",
            'data' => $data,
            'position' => $position
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'position_id' => 'required',
        ]);

        try{
            $formData = ([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'position_id' => $request->position_id,
                'is_active' => $request->is_active == 'true' ? true : false
            ]);

            if($request->password != null || $request->password != ''){
                $formData['password'] = bcrypt($request->password);
            }

            User::find($id)->update($formData);

            return redirect()->route('users.index')
                ->with('success', 'User successfully updated');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Error on line {$e->getLine()}: {$e->getMessage()}");
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', "Error on line {$e->getLine()}: {$e->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return response()->json('User successfully deleted');
        } catch (\Exception $e) {
            return response()->json("Error on line {$e->getLine()}: {$e->getMessage()}", 500);
        } catch (\Throwable $e) {
            return response()->json("Error on line {$e->getLine()}: {$e->getMessage()}", 500);
        }
    }
}
