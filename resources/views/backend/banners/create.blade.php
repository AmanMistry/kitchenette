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
                            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Banner Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Banner title"value="{{ old('title') }}"/>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="description">Banner Description</label>
                                    <textarea name="description" placeholder="Write some text here..." class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="photo">Banner Image</label>
                                    <div class="input-group">
                                        
                                        <input  class="form-control" type="file" name="photo">
                                      </div>
                                      <img id="holder" style="margin-top:15px;max-height:100px;">
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
                                <button type="submit" class="btn btn-success">Add Banner</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



   @endsection

   @section('scripts')
   <script src="./vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>
             $('#lfm').filemanager('image');
        </script>
   @endsection