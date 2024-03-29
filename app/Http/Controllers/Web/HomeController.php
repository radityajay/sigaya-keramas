<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CagarBudaya;
use App\Models\CagarBudayaImg;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $list_cagbud = CagarBudaya::with(['cagarBudayaImg'])->limit(3)->orderBy('created_at', 'desc')->get();
        // $cagarBudaya = Category::limit(5)->pluck('id');
        // $total = CagarBudaya::whereIn('category_id',$cagarBudaya)->count('id');
        $category = Category::limit(5)->get();

        foreach($category as $key => $item){
            $total = CagarBudaya::where('category_id',$item->id)->count('id');
            $category[$key]['total'] = $total;
        }
        // $total = CagarBudaya::count();
        // dd($category);
        return view('pages.web.home',[
            'page_title' => 'Beranda',
            'list_cagbud' => $list_cagbud,
            // 'total' => $total,
            'category' => $category,
        ]);
    }

    public function show($id){
        $data = CagarBudaya::with(['cagarBudayaImg'])->find($id);
        $slider = CagarBudayaImg::where('cagar_budaya_id', $id)->get();
        $cagarbud = CagarBudaya::all();
        // return $cagarbud;
        return view('pages.web.cagar-budaya.detail',[
            'page_title' => 'Detail Cagar Budaya',
            'data' => $data,
            'slider' => $slider,
            'cagarbud' => $cagarbud
        ]);
    }

    public function list_cagarbudaya(){
        $list_cagbud = CagarBudaya::with(['cagarBudayaImg'])->orderBy('created_at', 'desc')->get();
        $category = Category::all();
        // return $category;
        return view('pages.web.cagar-budaya.list',[
            'page_title' => 'List Cagar Budaya',
            'list_cagbud' => $list_cagbud,
            'category' => $category,
        ]);
    }

    public function filterCagarBudaya(Request $request){
        // dd($request->all());
        $data = CagarBudaya::when($request->category_id != null && $request->category_id != 'null', function ($query) use($request) {
            return $query->where('category_id', $request->category_id);
        })
        ->when($request->search != null && $request->search != 'null', function ($query) use($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        })
        ->orderBy('created_at', 'desc')
        ->get();
        // dd($data);
        return response()->json($data, 200);
    }

    public function listCagarBudayaApi(Request $request){
        // dd($request->all());
        $data = CagarBudaya::all();
        // dd($data);
        return response()->json($data, 200);
    }
}
