<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('./frontendcss/profile.css') }}">
    <title>User Profile</title>
</head>

<body>

    <!-- Nav Bootstrap CSS -->

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3d2e55;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Kitchenette</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('passchg') }}">Change Password</a></li>
                        
                        </ul>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orddetails') }}">Order</a>
                    </li>
                </ul>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> 
                        <i class="fas fa-sign-out-alt fa-2x" style="color: white;"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                   
                </li>




            </div>
        </div>
    </nav>
    <!-- Nav close Bootstrap CSS -->


    <!-- profile start -->
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ $user->full_name }}</span>
                    <span class="text-black-50">{{ $user->email }}</span>
                    <span class="text-black-50">{{ \App\Models\City::where('id',$user->city_id)->value('name') }}</span>
                </div>
            </div>
            
            <div class="col-md-8 border-right">
                
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                <form action="{{ route('update',$user->id) }}" method="post">
                    @csrf
                    <div class="row mt-2">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="full_name">Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="{{ $user->full_name }}" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="labels">Mobile Number</label>
                                <input type="number" name="phone" class="form-control" placeholder="{{ $user->phone }}" value="">
                            </div>
                        </div>
                            
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="labels">Address Line 1</label>
                                <textarea name="address" class="form-control" placeholder="{{ $user->address }}" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>

                    

                    <div class="row mt-3">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="labels">City</label>
                            <select name="city_id" class="form-control show-trick ">
                                <option value="">--Add/update City--</option>
                                
                                @foreach (\App\Models\City::get() as $city)
                                <option value="{{ $city->id }}">{{ $city->name}}</option> 
                                @endforeach
                                
                                
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">SaveProfile</button>
                    </div>
                </form>
                </div>
                
            </div>
        
            
        </div>
    </div>
    </div>
    </div>
    <!-- end profile body-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>