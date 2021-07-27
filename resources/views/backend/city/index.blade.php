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
                                <th> City </th>
                                <th><a href="/admin/city/create" class="btn btn-primary">Add new City</a></th>
                            
                            <!-- search  -->
                               
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>City name</th>
                                        <th>City status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                
                                @foreach($citys as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>    
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        <a href="{{ route("city.edit",$post->id) }}" class="float-left btn btn-success">Edit</a>
                                        
                                         
                                        <a href="{{ "deletecity/".$post['id'] }}" class="btn btn-danger">Delete</a>
                                       
                                        
                                        
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