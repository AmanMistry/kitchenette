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
                                <th> Catrgory </th>
                                <th><a href="/admin/category/create" class="btn btn-primary">Add new Catrgory</a></th>
                            
                            <!-- search  -->
                                
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>categoy type</th>
                                        <th>categoy meal</th>
                                        <th>categoy photo</th>
                                        <th>categoy status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                
                                @foreach($categories as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->type}}</td>
                                    <td>{{$post->meal}}</td>
                                    <td><img src="/photos/{{ $post->photo }}" alt="category img" style="max-height: 90px; max-width:120px;"></td>
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        <a href="{{ route("category.edit",$post->id) }}" class="float-left btn btn-success">Edit</a>
                                        
                                        <a href="{{ "deletecat/".$post['id'] }}" class="btn btn-danger">Delete</a>
                                        
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