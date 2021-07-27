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
                            <form action="{{ route('city.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">City Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter city name"value="{{ old('name') }}"/>

                                </div>
                                <br>
                                

                                <div class="form-group">
                                    <label for="status">City Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="">--City status list--</option>
                                        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>InActive</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Add City</button>

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