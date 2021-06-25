@extends('boothead.master')
  
  @section('content')

  <section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark">
                        
                        <p class="text-light bg-dark text-center fs-2">View Users</p>
                        

                    </div>
                    
                    <div class="card-body">
                        <div class="col-md-12">
                            @php
                                $post=\App\Models\User::where('id',$users->id)->first();
                            @endphp

                            <strong><h5 class="card-title text-center text-uppercase">{{ $post->full_name }}</h5></strong>
                            
                        <br>
                                <strong>Address:</strong>
                                <p>{!! html_entity_decode($post->address) !!}</p>
  
            
                                
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Mail ID:</strong>
                                        <p>{!! html_entity_decode($post->email) !!}</p>
                                        
                                  </div>
                                    <div class="col-md-6">
                                        <strong>Contact No:</strong>
                                        <p>{{($post->phone) }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Status:</strong>
                                        <p class="fw-bold text-uppercase text-success">{{ $post->status }}</p>
                                  </div>
                                    <div class="col-md-6">
                                        <strong>Role:</strong>
                                        <p class="fw-bold text-primary text-uppercase">{{ ($post->role) }}</p>
                                    </div>
                                </div>
                        </div>
                    </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
  @endsection