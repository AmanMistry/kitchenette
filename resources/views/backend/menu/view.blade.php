@extends('boothead.master')
  
  @section('content')

  <section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark">
                        
                        <p class="text-light bg-dark text-center fs-2">View Banner</p>
                        

                    </div>
                    
                    <div class="card-body">
                        <div class="col-md-12">
                            @php
                                $post=\App\Models\Menu::where('id',$menu->id)->first();
                            @endphp

                            <strong><h5 class="card-title text-center">{{ $post->title }}</h5></strong>
                            
                        <br>
                                <strong>Description:</strong>
                                <p>{!! html_entity_decode($post->description) !!}</p>
  
            
                                
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Price:</strong>
                                        <p>₹{{ number_format($post->price,2) }}</p>
                                  </div>
                                    <div class="col-md-6">
                                        <strong>Discount:</strong>
                                        <p>{{ number_format($post->discount,2) }}%</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Status:</strong>
                                        <p class="text-uppercase">{{ $post->status }}</p>
                                  </div>
                                    <div class="col-md-6">
                                        <strong>Offer_price:</strong>
                                        <p class="fw-bold text-success">₹{{ number_format($post->offer_price,2) }}</p>
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