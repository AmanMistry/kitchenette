<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Post</title>
     <!-- Bootstrap CSS -->
     
</head>
<body>
    
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            
                            <a href="/admin" class="btn btn-dark">Dashboard</a>
                            ADD Banner

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
                            <form action="{{ route('banner.store') }}" method="post">
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
                                    <label for="description">Banner Image</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="photo" multiple />
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <br>

                                <div class="form-group">
                                    <label for="status">Banner Status</label>
                                    <select name="status" class="form-control show-trick ">
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



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
   
    <script>
        setTimeout(sunction()
        {
            $('#alert').slideUp();
        },4000);
    </script>
    
</body>
</html>