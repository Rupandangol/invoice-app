<?php

namespace App\Http\Controllers;

use App\Helper\CounterHelper;

class HomeController extends Controller
{
    public function index() {
        $getCounts=new CounterHelper();
        $data=$getCounts->homepageCounters();
        return view('home.index',['data'=>$data,'sidebarHome'=>'active']);
    }
}
