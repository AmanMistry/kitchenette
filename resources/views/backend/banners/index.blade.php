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
                                <th> Banners </th>
                                <th><a href="/admin/banner/create" class="btn btn-primary">Add new Banner</a></th>
                            
                            <!-- search  -->
                                <form action="#" method="get">
                                    <th><input type="text" class="form-control" name="query" placeholder="search here"></th>
                                    <th><button type="submit" class="btn btn-primary">Search</button></th>
                                </form>
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Banner title</th>
                                        <th>Banner description</th>
                                        <th>Banner photo</th>
                                        <th>Banner status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                
                                @foreach($banners as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td><img src="{{ $post->photo }}" alt="banner img" style="max-height: 90px; max-width:120px;"></td>
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        <a href="{{ route("banner.edit",$post->id) }}" class="float-left btn btn-success">Edit</a>
                                        
                                        <a href="{{ "delete/".$post['id'] }}" class="btn btn-danger">Delete</a>
                                        
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