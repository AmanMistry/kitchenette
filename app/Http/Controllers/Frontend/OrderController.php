<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\City;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function ord($id)
    {
        $menu=Menu::find($id);
        if($menu)
        {
            return view('frontend.orders.order',compact(['menu']));
        }
        else{
            return back()->with('error','Data not found');
        }
        
    }



    public function orddetails()
    {
        $user = Auth::user()->id;
                  
        $order=DB::table('orders')->where('user_id','LIKE','%'.$user.'%')->paginate(10);
            return view('frontend.orders.orderdetails',compact('order'));
            
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'flat_no'=>'string|required',
            'area'=>'string|required',
            'landmark'=>'string|required',
            'pincode'=>'nullable|numeric',
            'package'=>'string|required',
            'ord_date'=>'string|required',
            'pack_type'=>'string|required',
            'phone'=>'nullable|numeric',
            'city_id'=>'required',
        ]);

        $data=$request->all();
 
        $status=Order::create($data);
        if($status)
        {
            return view('frontend.layouts.master')->with('success','successfully created order');
        }
        else{
            return back()->with('error','something went wrong');
        }
    }

    public function show($id)
    {
        $order=Order::find($id);
        if($order)
        {
            return view('frontend.orders.view',compact('order'));
        }
        else{
            return back()->with('error','Data not found');
        }
    }
    
}
