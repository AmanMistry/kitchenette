@extends('boothead.master')
  
  @section('content')
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            
                            
                            ADD Category

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
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="type">Category Type</label>
                                    <select name="type" class="form-control show-trick ">
                                        <option value="">--Category list--</option>
                                        <option value="veg" {{ old('type')=='veg' ? 'selected' : '' }}>Veg</option>
                                        <option value="nonveg" {{ old('type')=='nonveg' ? 'selected' : '' }}>NonVeg</option>
                                    </select>
                                </div>
                                <br>
                                
                                
                                <div class="form-group">
                                    <label for="meal">Category Meal</label>
                                    <select name="meal" class="form-control show-trick ">
                                        <option value="">-- meal list--</option>
                                        <option value="lunch" {{ old('meal')=='lunch' ? 'selected' : '' }}>lunch</option>
                                        <option value="dinner" {{ old('meal')=='dinner' ? 'selected' : '' }}>dinner</option>
                                    </select>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="photo">category Image</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" multiple />
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="status">Category Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="">--Category status list--</option>
                                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>InActive</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection