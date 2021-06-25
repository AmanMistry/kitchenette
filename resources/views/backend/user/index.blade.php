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
                                <th> User </th>
                                <th><a href="/admin/user/create" class="btn btn-primary">Add User</a></th>
                            
                            <!-- search  -->
                                <form action="{{ route('web.search') }}" method="get">
                                    <th><input type="text" class="form-control" name="query" placeholder="search by mail ID"></th>
                                    <th><button type="submit" class="btn btn-primary">Search</button></th>
                                </form>
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        @if (isset($users))
                            
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>full_name</th>
                                        <th>email</th>
                                        <th>photo</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>role</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if (count($users)>0)
                                    
                                
                                @foreach($users as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->full_name}}</td>
                                    <td>{{$post->email}}</td>
                                    <td><img src="{{ $post->photo }}" alt="user img" style="max-height: 90px; max-width:120px;"></td>
                                    <td>{{$post->phone}}</td>
                                    <td>{{$post->address}}</td>
                                    <td>{{$post->role}}</td>
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        

                                        <a href="{{ route("user.show",$post->id) }}" class="btn btn-primary">View</a>

                                        <a href="{{ route("user.edit",$post->id) }}" class="btn btn-success">Edit</a>
                                        
                                        <a href="{{ "deleteuser/".$post->id }}" class="btn btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                        <tr><td>No result found</td></tr>
                                @endif
                            </table>  
                                 
                           
                               
                           
  
                                    
                        @endif

                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection