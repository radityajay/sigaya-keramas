<?php

namespace App\Http\Controllers;

use App\Models\CagarBudaya;
use App\Models\CagarBudayaImg;
use App\Models\Category;
use Illuminate\Http\Request;

class CagarBudayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->type == 'datatable') {
            $data = CagarBudaya::with('category')->orderBy('created_at');

            return datatables()->of($data)
                ->editColumn('created_at', function($data){
                    return date('Y-m-d', strtotime($data->created_at));
                })
                ->editColumn('category.name', function($data){
                    return $data->category ? $data->category->name : '-';
                })
                // ->addColumn('photos', function ($data) {
                //     $photo = '';
                //     if ($data->photo !== null) {
                //         $photo = '<img class="photo-img" src="' . $data->photo . '" alt="Photo">';
                //     } else {
                //         $photo = '<img class="photo-img" src="/assets/images/user.png"
                //         alt="Photo">';
                //     }

                //     return $photo;
                // })
                ->addColumn('action', function ($data) {
                    $action = '';

                    $action .= '<a href="' . route('cagar-budaya.edit', $data->id) . '" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit" style="padding-right: 15px"><i class="ri-edit-2-fill"></i></a>';

                    $action .= '<a href="' . route('cagar-budaya.print', $data->id) . '" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Edit" style="padding-right: 15px"><i class="ri-qr-code-line"></i></a>';

                    if($data->is_default == false){
                        $action .= '<a class="text-danger delete-item" data-label="Unit" data-url="' . route('cagar-budaya.destroy', $data->id) . '" data-id="' . $data->id . '" data-bs-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer"><i style="color: red" class="ri-delete-bin-2-fill"></i></a>';
                    }

                    return $action;
                })
                ->rawColumns(['action', 'photos'])
                ->make(true);
        }

        return view('pages.cagar-budaya.index', [
            'page_title' => 'Cagar Budaya',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.cagar-budaya.form', [
            'page_title' => 'Cagar Budaya',
            'category' => $category
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
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah digunakan!'
        ], [
            'title' => 'judul',
            'description' => 'deskripsi',
            'latitude' => 'titik latitude pada maps',
            'longitude' => 'titik latitude pada maps',
        ]);

        try {
            $cagarBudaya = CagarBudaya::create([
                'name' => $request->name,
                'description' => $request->description,
                'sound' => $request->sound,
                'videos' => $request->video,
                'lat' => $request->latitude,
                'long' => $request->longitude,
                'category_id' => $request->category_id,
            ]);

            if ($request->list_cagarbudaya_images) {
                foreach ($request->list_cagarbudaya_images as $index => $item) {
                    $cagarbudaya_image = [
                        'cagar_budaya_id' => $cagarBudaya->id,
                        'image' => $item['url'] ?? null,
                        'setfront' => $index == 0 ? '1' : '0'
                    ];
                    CagarBudayaImg::create($cagarbudaya_image);
                }
            }

            $img = CagarBudayaImg::where('cagar_budaya_id', $cagarBudaya->id)->where('setfront', '1')->first();

            CagarBudaya::find($cagarBudaya->id)->update([
                'photo' => $img->image
            ]);

            return redirect()->route('cagar-budaya.index')
                ->with('success', 'Cagar Budaya berhasil dibuat');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $data = CagarBudaya::where('id', $id)->first();
        return view('pages.cagar-budaya.print', [
            'page_title' => 'Cagar Budaya Print',
            'data' => $data
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
        $data = CagarBudaya::find($id);
        $listImage = CagarBudayaImg::where('cagar_budaya_id', $id)->get();
        $category = Category::all();
        if ($data == null) {
            abort(404);
        }
        
        return view('pages.cagar-budaya.form', [
            'page_title' => 'Cagar Budaya',
            'data' => $data,
            'listImage' => $listImage,
            'category' => $category
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
            'description' => 'required',
        ], [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah digunakan!'
        ], [
            'title' => 'judul',
            'description' => 'deskripsi',
        ]);

        try {
            $form = ([
                'name' => $request->name,
                'description' => $request->description,
                'sound' => $request->sound,
                'videos' => $request->video,
                'photo' => isset($photo) ? $photo : null,
                'lat' => $request->latitude,
                'long' => $request->longitude,
            ]);

            CagarBudaya::find($id)->update($form);

            CagarBudayaImg::where('cagar_budaya_id', $id)->delete();
            if ($request->list_cagarbudaya_images && is_array($request->list_cagarbudaya_images)) {
                foreach ($request->list_cagarbudaya_images as $index => $item) {
                    // dd($index);
                    $cagar_budaya_image = [
                        'cagar_budaya_id' => $id,
                        'image' => $item['url'],
                        'setfront' => $index == 0 ? '1' : '0'
                    ];
                    CagarBudayaImg::create($cagar_budaya_image);
                }
            }

            $img = CagarBudayaImg::where('cagar_budaya_id', $id)->where('setfront', '1')->first();

            CagarBudaya::find($id)->update([
                'photo' => $img->image
            ]);

            return redirect()->route('cagar-budaya.index')
                ->with('success', 'Cagar Budaya berhasil diubah');
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

    public function upload(Request $request)
    {
        $file = $request->file('file');

        $photo = time() . "-" . $file->getClientOriginalName();

        $path = $request->file('file')->storeAs('public/upload/cagar-budaya/', $photo);

        return response()->json([
            'success' => true,
            'data' => $photo,
            'message' => null
        ]);
    }
}
