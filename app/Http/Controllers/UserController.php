<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Auth::user()->role;
        if($role=='admin'){
            $users=User::orderBy('id','DESC')->get();
            return view('backend.user.index',compact('users'));
        }
        else{
            return view('error');
        }
        
    }

    public function search(Request $request)
    {
        

        if(isset($_GET['query'])) //strlen min 2 str in search query
        {
            $search_text =$_GET['query'];//form data search
            $users =DB::table('users')->where('email','LIKE','%'.$search_text.'%')->paginate(10);
            return view('backend.user.index',['users'=>$users]);
        }
        else
        {
            //without search any key word
            $users=User::paginate(10);
            $users->appends($request->all());//pagination next preview
            return view('backend.user.index');
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name'=>'string|required',
            'email'=>'email|required|unique:users,email',
            'password'=>'min:4|required',
            'photo'=>'required',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'role'=>'required|in:admin,customer,seller',
            'status'=>'required|in:active,inactive'
        ]);

        $data=$request->all();

       $data['password']=Hash::make($request->password);
        
        $status=User::create($data);
        if($status)
        {
            return redirect()->route('user.index')->with('success','successfully User');
        }
        else{
            return back()->with('error','something went wrong');
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
        $users=User::find($id);
        if($users)
        {
            return view('backend.user.view',compact('users'));
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::find($id);
        if($users)
        {
            return view('backend.user.edit',compact('users'));
        }
        else{
            return back()->with('error','Data not found');
        }
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
        $users=User::find($id);
        if($users)
        {
            $this->validate($request,[
                'full_name'=>'string|required',
                'photo'=>'required',
                'phone'=>'string|nullable',
                'address'=>'string|nullable',
                'city_id'=> 'required|string',
                'role'=>'required|in:admin,customer,seller',
                'status'=>'required|in:active,inactive'
            ]);
            $data=$request->all();

            

            $status=$users->fill($data)->save();
            if($status)
            {
                return redirect()->route('user.index')->with('success','successfully Updated User');
            }
            else{
                return back()->with('error','something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
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
        $delete= User::find($id);
        $delete->delete();
        return redirect()->route('user.index');
    }
}
