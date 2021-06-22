<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>ALL Post</title>
     <!-- Bootstrap CSS -->
     
    </head>
<body>
    
    <section style="padding-top:60px;">
        
        <div class="container">
            
            <div class="col-lg-12">
                @include('backend.layouts.notifaction')
            </div>

            <a href="/admin" class="btn btn-success">Dashboard</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <table class="table">
                            <tr>
                                <th> Banners </th>
                                <th><a href="/admin/banner/create" class="btn btn-success">Add new Banner</a></th>
                            
                            <!-- search  -->
                                <form action="#" method="get">
                                    <th><input type="text" class="form-control" name="query" placeholder="search here"></th>
                                    <th><button type="submit" class="btn btn-success">Search</button></th>
                                </form>
                            </tr>
                            </table>
                        </div>
                        
                        <div class="card-body">
                        
                        
                        
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Banner title</th>
                                        <th>Banner description</th>
                                        <th>Banner photo</th>
                                        <th>Banner status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                
                                @foreach($banners as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td><img src="{{ $post->photo }}" alt="banner img" style="max-height: 90px; max-width:120px;"></td>
                                    <td>
                                        {{ $post->status }}
                                    </td>
                                    <td>
                                        <a href="{{ route("banner.edit",$post->id) }}" class="float-left btn btn-success">Edit</a>
                                        
                                        <a href="{{ "delete/".$post['id'] }}" class="btn btn-danger">Delete</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                               
                            </table>        
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
    
   
    

</body>
</html>