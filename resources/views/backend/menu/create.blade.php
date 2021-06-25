@extends('boothead.master')
  
  @section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            
                           
                            ADD menu

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
                            <form action="{{ route('menu.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Menu Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Menu title"value="{{ old('title') }}"/>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="description">Menu Description</label>
                                    <textarea name="description" placeholder="Write some text here..." class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="description">Menu Image</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" multiple />
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="price">Menu Price</label>
                                    <input type="number" step="any" name="price" class="form-control" placeholder="Enter menu price"value="{{ old('price') }}"/>
                                </div>
                                
                                <br>

                                <div class="form-group">
                                    <label for="discunt">Menu Discount</label>
                                    <input type="number" step="any" name="discount" class="form-control" placeholder="Enter discount"value="{{ old('discount') }}"/>
                                </div>
                                
                                <br>

                                <div class="form-group">
                                    <label for="cat_id">Menu category</label>
                                    <select name="cat_id" class="form-control show-trick ">
                                        <option value="">--Categorys list--</option>
                                        
                                        @foreach (\App\Models\Category::get() as $menu)
                                        <option value="{{ $menu->id }}">(type):{{ $menu->type}} ,(meal):{{ $menu->meal }}</option> 
                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                                
                                <br>

                                <div class="form-group">
                                    <label for="vendor_id">Vendors</label>
                                    <select name="vendor_id" class="form-control show-trick ">
                                        <option value="">--Vendor list--</option>
                                        
                                        @foreach (\App\Models\User::where('role','vendor')->get() as $vendor)
                                        <option value="{{ $vendor->id }}" >{{ $vendor->full_name }}</option> 
                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                                
                                <br>


                                <div class="form-group">
                                    <label for="status">Banner Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="">--Banner status list--</option>
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