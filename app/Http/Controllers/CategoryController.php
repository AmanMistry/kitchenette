<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
            $categories=Category::orderBy('id','DESC')->get();
            return view('backend.category.index',compact('categories'));
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
        return view('backend.category.create');
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
            'type' => 'nullable|in:veg,nonveg',
            'meal' => 'nullable|in:lunch,dinner',
            'photo' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|in:active,inactive',
        ]);
        $data=$request->all();
        
        $name = $request->file('photo')->getClientOriginalName();
        $photo=$request->photo->move(public_path('photos'), $name);
        $data['photo']=$name;

        $status=Category::create($data);
        if($status)
        {
            return redirect()->route('category.index')->with('success','successfully created Category');
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
        $categories=Category::find($id);
        if($categories)
        {
            return view('backend.category.edit',compact('categories'));
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
        $categories=Category::find($id);
        if($categories)
        {
            $this->validate($request,[
                'type' => 'nullable|in:veg,nonveg',
                'meal' => 'nullable|in:lunch,dinner',
                'photo' =>  'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'nullable|in:active,inactive',
            ]);
            $data=$request->all();
            
            $status=$categories->fill($data)->save();
            if($status)
            {
                return redirect()->route('category.index')->with('success','successfully Updated Category');
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
        $data=Category::find($id);
        $data->delete();
        return redirect()->route('category.index')->with('success delete','successfully deleted catefory');
    }
}
