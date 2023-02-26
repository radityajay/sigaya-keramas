<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->type == 'datatable') {
            $data = Position::orderBy('created_at');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $action = '';

                    $action .= '<a href="' . route('position.edit', $data->id) . '" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit" style="padding-right: 15px"><i class="ri-edit-2-fill"></i></a>';

                    if($data->is_default == false){
                        $action .= '<a class="text-danger delete-item" data-label="Unit" data-url="' . route('position.destroy', $data->id) . '" data-id="' . $data->id . '" data-bs-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer"><i style="color: red" class="ri-delete-bin-2-fill"></i></a>';
                    }

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.position.index', [
            'page_title' => 'Position',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.position.form', [
            'page_title' => 'Position',
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
            'name' => 'required'
        ]);

        try{
            Position::create([
                'name' => $request->name
            ]);

            return redirect()->route('position.index')
                ->with('success', 'Position successfully created');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Position::where('id', $id)->first();

        if(!$data){
            abort(404);
        }

        return view('pages.position.form', [
            'page_title' => "Edit {$data->name}",
            'data' => $data
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
            'name' => 'required'
        ]);

        try{
            $formData = ([
                'name' => $request->name
            ]);

            Position::find($id)->update($formData);

            return redirect()->route('position.index')
                ->with('success', 'Position successfully updated');
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
            Position::find($id)->delete();
            return response()->json('Position successfully deleted');
        } catch (\Exception $e) {
            return response()->json("Error on line {$e->getLine()}: {$e->getMessage()}", 500);
        } catch (\Throwable $e) {
            return response()->json("Error on line {$e->getLine()}: {$e->getMessage()}", 500);
        }
    }
}
