@extends('boothead.master')
  
  @section('content')
    
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            
                            
                            Edit User

                        </div>
                        
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
                            <form action="{{ route('user.update',$users->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="full_name">User name</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="Enter Banner title" value="{{ $users->full_name }}"/>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="address">User Address</label>
                                    <textarea name="address" placeholder="Write some text here..." class="form-control"  id="" cols="30" rows="10">{{ $users->address }}</textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="photo">User Photo</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" value="{{ $users->photo }}" multiple />
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <br>


                               

                                <div class="form-group">
                                    <label for="phone">Contact Number</label>
                                    <input type="number" step="any" name="phone" class="form-control" placeholder="Enter phone"value="{{ $users->phone }}"/>
                                </div>
                                
                                <br>


                                <div class="form-group">
                                    <label for="city_id">User City</label>
                                    <select name="city_id" class="form-control show-trick ">
                                        <option value="">--User City list--</option>
                                        @foreach (\App\Models\City::get() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name}}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <br> 


                                <div class="form-group">
                                    <label for="role">User Role</label>
                                    <select name="role" class="form-control show-trick ">
                                        <option value="admin" {{ $users->role=='admin' ? 'selected' : '' }}>ADMIN</option>
                                        <option value="customer" {{ $users->role=='customer' ? 'selected' : '' }}>CUSTOMER</option>
                                        <option value="seller" {{ $users->role=='seller' ? 'selected' : '' }}>SELLER</option>
                                    </select>
                                </div>
                                <br>


                                


                                <div class="form-group">
                                    <label for="status">User Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="active" {{ $users->status=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $users->status=='inactive' ? 'selected' : '' }}>InActive</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Update Users</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection