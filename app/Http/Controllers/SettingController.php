<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company=Company::all()->first();
        return view('setting.index',['company'=>$company,'sidebarSetting'=>'active']);
    }

    /**
     * Store a newly created resource in storage or Update.
     */
    public function store(SettingStoreRequest $request)
    {
        $setting=Company::all()->first();
        if($setting!=null){
            $setting->update($request->all());
        }else{
            Company::create($request->all());
        }
        return redirect()->back()->with('success','Updated Successfully');
    }
}
