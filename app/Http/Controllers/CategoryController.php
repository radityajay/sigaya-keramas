<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->type == 'datatable') {
            $data = Category::orderBy('created_at');

            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $action = '';

                    $action .= '<a href="' . route('category.edit', $data->id) . '" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit" style="padding-right: 15px"><i class="ri-edit-2-fill"></i></a>';

                    if($data->is_default == false){
                        $action .= '<a class="text-danger delete-item" data-label="Unit" data-url="' . route('category.destroy', $data->id) . '" data-id="' . $data->id . '" data-bs-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer"><i style="color: red" class="ri-delete-bin-2-fill"></i></a>';
                    }

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.category.index', [
            'page_title' => 'Kategori',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.Form', [
            'page_title' => 'Add Kategori',
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
        // dd($request->file('photo'));
        $request->validate([
            'name' => 'required'
        ]);

        try{
            if (!empty($request->file('photo'))) {
                $file = $request->file('photo');

                $photo = time() . "-" . $file->getClientOriginalName();

                $path = $request->file('photo')->storeAs('public/upload/icons/', $photo);
            }

            Category::create([
                'name' => $request->name,
                'icons' => isset($photo) ? $photo : null,
            ]);

            return redirect()->route('category.index')
                ->with('success', 'Kategori berhasil dibuat');
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
        $data = Category::where('id', $id)->first();

        if(!$data){
            abort(404);
        }

        return view('pages.category.form', [
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
        // dd($request->all());
        $oldPhoto = Category::where('id', $id)->orderBy('created_at', 'desc')->first();
        $request->validate([
            'name' => 'required'
        ]);

        try{
            if ($request->file('photo')) {
                $file = $request->file('photo');

                $photo = time() . "-" . $file->getClientOriginalName();

                $path = $request->file('photo')->storeAs('public/upload/icons', $photo);
            } else {
                $photo = $oldPhoto ? $oldPhoto->icons : '-';
            }



            $formData = ([
                'name' => $request->name,
                'icons' => isset($photo) ? $photo : null,
            ]);

            Category::find($id)->update($formData);

            return redirect()->route('category.index')
                ->with('success', 'Kategori berhasil update');
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
        //
    }
}
