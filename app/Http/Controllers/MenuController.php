<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class MenuController extends Controller
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
            $menus=Menu::orderBy('id','DESC')->get();
            return view('backend.menu.index',compact('menus'));
        }
        else{
            return view('error');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.create');
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
            'title'=>'string|required',
            'descrtption'=>'string|nullable',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'=>'nullable|numeric',
            'discount'=>'nullable|numeric',
            'cat_id'=>'required',
            'city_id'=>'required',
            'vendor_id'=>'required',
            'status'=>'nullable|in:active,inactive'
        ]);

        $data=$request->all();

        $name = $request->file('photo')->getClientOriginalName();
        $photo=$request->photo->move(public_path('photos'), $name);
        $data['photo']=$name;

        $slug=Str::slug($request->input('title'));
        $slug_count=Menu::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;

        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));
        
        
        $status=Menu::create($data);
        if($status)
        {
            return redirect()->route('menu.index')->with('success','successfully created menu');
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
        $menu=Menu::find($id);
        if($menu)
        {
            return view('backend.menu.view',compact('menu'));
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
        $menu=Menu::find($id);
        if($menu)
        {
            return view('backend.menu.edit',compact('menu'));
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
        $menu=Menu::find($id);
        if($menu)
        {
            $this->validate($request,[
                'title'=>'string|required',
                'descrtption'=>'string|nullable',
                'photo'=>'required',
                'price'=>'nullable|numeric',
                'discount'=>'nullable|numeric',
                'cat_id'=>'required',
                'city_id'=>'required',
                'vendor_id'=>'required',
                'status'=>'nullable|in:active,inactive'
            ]);
            $data=$request->all();

            $name = $request->file('photo')->getClientOriginalName();
            $photo=$request->photo->move(public_path('photos'), $name);
            $data['photo']=$name;
            
            $slug=Str::slug($request->input('title'));
            $slug_count=Menu::where('slug',$slug)->count();
            if($slug_count>0){
                $slug = time().'-'.$slug;
            }
            $data['slug']=$slug;

            $data['offer_price']=($request->price-(($request->price*$request->discount)/100));


            $status=$menu->fill($data)->save();
            if($status)
            {
                return redirect()->route('menu.index')->with('success','successfully Updated Menu');
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
        $delete= Menu::find($id);
        $delete->delete();
        return redirect()->route('menu.index');
    }


}
