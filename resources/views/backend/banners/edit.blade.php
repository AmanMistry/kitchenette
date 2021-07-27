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
                            <form action="{{ route('banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="title">Banner Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Banner title" value="{{ $banner->title }}"/>

                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="description">Banner Description</label>
                                    <textarea name="description" placeholder="Write some text here..." class="form-control"  id="" cols="30" rows="10">{{ $banner->description }}</textarea>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="description">Banner Image</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" value="/photos/{{ $banner->photo }}" multiple />
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="status">Banner Status</label>
                                    <select name="status" class="form-control show-trick ">
                                        <option value="active" {{ $banner->status=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $banner->status=='inactive' ? 'selected' : '' }}>InActive</option>
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