@extends('boothead.master')
  
  @section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            
                           
                            ADD User

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
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">User Name</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="Enter user name"value="{{ old('full_name') }}"/>

                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="email">User Mail</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter user email"value="{{ old('email') }}"/>

                                </div>
                                <br>


                                <div class="form-group">
                                    <label for="phone">Contact Number</label>
                                    <input type="number" step="any" name="phone" class="form-control" placeholder="Enter phone"value="{{ old('phone') }}"/>
                                </div>
                                
                                <br>

                                <div class="form-group">
                                    <label for="password">User Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Enter password"value="{{ old('password') }}"/>

                                </div>
                                <br>


                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" placeholder="Write some text here..." class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="description">User Image</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" multiple />
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="role">User Role</label>
                                    <select name="role" class="form-control show-trick ">
                                        <option value="">--User role list--</option>
                                        <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>ADMIN</option>
                                        <option value="customer" {{ old('role')=='customer' ? 'selected' : '' }}>CUSTOMER</option>
                                        <option value="vendor" {{ old('role')=='vendor' ? 'selected' : '' }}>VENDOR</option>
                                    </select>
                                </div>
                                <br>                                

                                <div class="form-group">
                                    <label for="status">User Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="">--User status list--</option>
                                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>InActive</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Add Menu</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection