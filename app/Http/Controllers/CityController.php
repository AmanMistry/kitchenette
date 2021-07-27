<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class CityController extends Controller
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
            $citys=City::orderBy('id','DESC')->get();
            return view('backend.city.index',compact('citys'));

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
        return view('backend.city.create');
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
            'name' => 'string|required',
            'status' => 'nullable|in:active,inactive',
        ]);
        
        $data=$request->all();
        
        $slug=Str::slug($request->input('name'));
        $slug_count=City::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        
        $status=City::create($data);
        if($status)
        {
            return redirect()->route('city.index')->with('success','successfully created City');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=City::find($id);
        if($city)
        {
            return view('backend.city.edit',compact('city'));
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
        $city=City::find($id);
        if($city)
        {
            $this->validate($request,[
                'name' => 'string|required',
                'status' => 'nullable|in:active,inactive',
            ]);
            $data=$request->all();
            
            $status=$city->fill($data)->save();
            if($status)
            {
                return redirect()->route('city.index')->with('success','successfully Updated city');
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
        $data=City::find($id);
        $data->delete();
        return redirect()->route('city.index')->with('success delete','successfully deleted city');
    }
}
