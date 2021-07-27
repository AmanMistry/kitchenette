<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        $role=Auth::user()->role;
        if($role=='admin'){
            return view('backend.index');
        }
        else{
            return view('error');
        }
        
        
    }

    
    public function seller()
    {
        $role=Auth::user()->role;
        if($role=='seller'){

            return view('seller.master');
        }
        else{
            return view('error');
        }
       
       
    }

    public function customer()
    {

        $role=Auth::user()->role;
        if($role=='customer'){

            return view('frontend.layouts.master');
        }
        else{
            return view('error');
        }
        
    }

}
