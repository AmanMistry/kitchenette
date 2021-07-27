@extends('boothead.master')
  
  @section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        
                        
                        <div class="card-body">
                            <div class="col-md-12">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>     
                                @endif
                            </div>
                            <form action="{{ route('city.update',$city->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="name">City Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter city name" value="{{ $city->name }}"/>

                                </div>
                                <br>
                                

                                <div class="form-group">
                                    <label for="status">City Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="active" {{ $city->status=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $city->status=='inactive' ? 'selected' : '' }}>InActive</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Update Banner</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection