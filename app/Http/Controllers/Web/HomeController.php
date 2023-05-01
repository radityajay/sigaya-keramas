<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CagarBudaya;
use App\Models\CagarBudayaImg;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $list_cagbud = CagarBudaya::with(['cagarBudayaImg'])->limit(3)->get();
        $total = CagarBudaya::count();
        // return $list_cagbud;
        return view('pages.web.home',[
            'page_title' => 'Beranda',
            'list_cagbud' => $list_cagbud,
            'total' => $total
        ]);
    }

    public function show($id){
        $data = CagarBudaya::with(['cagarBudayaImg'])->find($id);
        $slider = CagarBudayaImg::where('cagar_budaya_id', $id)->get();
        // return $slider;
        return view('pages.web.cagar-budaya.detail',[
            'page_title' => 'Detail Cagar Budaya',
            'data' => $data,
            'slider' => $slider
        ]);
    }

    public function list_cagarbudaya(){
        $list_cagbud = CagarBudaya::with(['cagarBudayaImg'])->get();
        // return $list_cagbud;
        return view('pages.web.cagar-budaya.list',[
            'page_title' => 'List Cagar Budaya',
            'list_cagbud' => $list_cagbud
        ]);
    }
}
