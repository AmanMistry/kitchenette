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
                                <th><a href="/admin/menu/create" class="btn btn-success">Add new Menu</a></th>
                            
                            <!-- search  -->
                                <form action="#" method="get">
                                    <th><input type="text" class="form-control" name="query" placeholder="search here"></th>
                                    <th><button type="submit" class="btn btn-success">Search</button></th>
                                </form>
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Menu title</th>
                                        <th>Menu slug</th>
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
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->description}}</td>
                                    <td><img src="{{ $post->photo }}" alt="menu img" style="max-height: 90px; max-width:120px;"></td>
                                    <td>{{$post->price}}₹</td>
                                    <td>{{$post->discount}}%</td>
                                    <td>{{$post->offer_price}}₹</td>
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" title="view" data-bs-toggle="modal" data-bs-target="#menuId{{ $post->id }}" class="btn btn-primary">view</a>

                                        <a href="{{ route("menu.edit",$post->id) }}" class="btn btn-success">Edit</a>
                                        
                                        <a href="{{ "delete/".$post['id'] }}" class="btn btn-danger">Delete</a>
                                        
                                    </td>

                                                   <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="menuId{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        @php
            $menu=\App\Models\Menu::where('id',$post->id)->first();
        @endphp
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <strong>Description:</strong>
          <p>{!! html_entity_decode($post->description) !!}</p>

          
          <strong>Price:</strong>
          <p>{{ number_format($post->price,2) }}₹</p>

          <strong>discount:</strong>
          <p>{{ number_format($post->discount,2) }}%</p>

          <strong>Offer_price:</strong>
          <p>{{ number_format($post->offer_price,2) }}₹</p>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                                    

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