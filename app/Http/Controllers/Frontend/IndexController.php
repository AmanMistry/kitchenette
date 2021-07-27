<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\City;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $banners=Banner::where(['status'=>'active'])->orderBy('id','DESC')->limit('5')->get();
        $citys=City::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $users=User::where(['status'=>'active'])->orderBy('id','DESC')->limit('5')->get();
        $menu=Menu::where(['status'=>'active'])->orderBy('id','DESC')->limit('12')->get();
        return view('frontend.layouts.master',compact(['banners','citys','menu','users']));
    }

    

    public function show($id)
    {
        $menu=Menu::find($id);
        if($menu)
        {
            return view('frontend.layouts.menuitem',compact(['menu']));
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function profile()
    {
        $user=Auth::user();
        
            return view('frontend.layouts.profile',compact('user'));
        
    }

    public function userAuth(){
        return view('auth.login');
    }

    public function update(Request $request, $id)
    {
        $user=User::where('id',$id)->update(['full_name'=>$request->full_name,'phone'=>$request->phone,'address'=>$request->address,'city_id'=>$request->city_id]);
        if($user)
        {
            return back()->with('sucess','updated successfully');
        }
        else{
            return back()->with('error','something went wrong');
        }
    }

    public function passchg()
    {
        $user=Auth::user();
        
            return view('frontend.layouts.passchg',compact('user'));
        
    }

    public function chgpass(Request $request, $id)
    {
        $this->validate($request,[
            'oldpassword'=>'nullable|min:3',
            'newpassword'=>'nullable|min:3',
            'confirmed_pass'=>'same:newpassword',
        ]);
        
        $hashpassword=Auth::user()->password;
        
        if(\Hash::check($request->oldpassword,$hashpassword))
        {
            if(!\Hash::check($request->newpassword,$hashpassword))
            {
                $check=User::where('id',$id)->update(['password'=>Hash::make($request->newpassword)]);
                if($check){
                    return view('auth.login');
                }
                
            }
            else{
                return back()->with('error','new password can not be same with old password');
            }
        }
        else{
            return back()->with('error','old password does not match');
        }
    }
    
    public function registerSubmit(Request $request){
        $this ->validate($request,[
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:4|required|confirmed',
            'city_id'=> 'required|string',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        if($check){
            return view('auth.login');
        }
        else{
            return back()->with('error','Please Check Your Credentials');
        }
    }

    private function create(array $data){
        return User::create([
            'full_name'=>$data['full_name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'city_id'=>$data['city_id'],
        ]);
   }
    
   public function searchcty(Request $request)
    {

         
        if(isset($_GET['query'])) //strlen min 2 str in search query
        {
            $search_text =$_GET['query'];//form data search
            $menu =DB::table('menus')->where('city_id','LIKE','%'.$search_text.'%')->paginate(10);
            return view('frontend.layouts.master',['menu'=>$menu]);
        }
        else
        {
            //without search any key word
            $menu=Menu::paginate(10);
            $menu->appends($request->all());//pagination next preview
            return view('frontend.layouts.master');
        }
         
    }
   
        
    
}
