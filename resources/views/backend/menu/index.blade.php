@extends('boothead.master')
  
  @section('content')
    <section style="padding-top:60px;">
        
        <div class="container">
            
            <div class="col-lg-12">
                @include('backend.layouts.notifaction')
            </div>

            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <table class="table">
                            <tr>
                                <th> Menu </th>
                                <th><a href="/admin/menu/create" class="btn btn-primary">Add new Menu</a></th>
                            
                            <!-- search  -->
                                
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Menu title</th>
                                        <th>Menu city</th>
                                        <th>Menu description</th>
                                        <th>Menu photo</th>
                                        <th>Menu price</th>
                                        <th>Menu discount</th>
                                        <th>offer_price</th>
                                        <th>Menu status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                
                                @foreach($menus as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->city_id}}</td>
                                    <td>{{$post->description}}</td>
                                    <td><img src="/photos/{{ $post->photo }}" alt="menu img" style="max-height: 90px; max-width:120px;"></td>
                                    <td>{{$post->price}}₹</td>
                                    <td>{{$post->discount}}%</td>
                                    <td>{{$post->offer_price}}₹</td>
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        

                                        <a href="{{ route("menu.show",$post->id) }}" class="btn btn-primary">View</a>

                                        <a href="{{ route("menu.edit",$post->id) }}" class="btn btn-success">Edit</a>
                                        
                                        <a href="{{ "deletemenu/".$post['id'] }}" class="btn btn-danger">Delete</a>
                                        
                                    </td>
                                    
                                
                           
  
 


</tr>
@endforeach
</table>   
                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection