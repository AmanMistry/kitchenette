<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function selprofile()
    {
        $user=Auth::user();
        
        return view('seller.sellerprofile',compact('user'));
        
    }

    public function selchgpass()
    {
        $user=Auth::user();
        
            return view('seller.selchgpass',compact('user'));
        
    }
}
