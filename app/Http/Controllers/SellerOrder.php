<?php

namespace App\Http\Controllers;
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


class SellerOrder extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
                  
        $order=DB::table('orders')->where('seller_id','LIKE','%'.$user.'%')->paginate(10);
            return view('seller.orderseller.sellerorder',compact('order'));
            
    }

    public function show($id)
    {
        $order=Order::find($id);
        if($order)
        {
            return view('seller.orderseller.view',compact('order'));
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function destroy($id)
    {
        $data=Order::find($id);
        $data->delete();
        return redirect()->route('sellerorder.index')->with('success delete','successfully deleted banner');
    }

}
