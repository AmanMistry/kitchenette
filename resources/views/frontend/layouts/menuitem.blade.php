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
    
    <link rel="stylesheet"  href="{{ asset('./frontendcss/menuitem.css') }}">

    <title>Menu View</title>
</head>

<body>

    <!-- Nav Bootstrap CSS -->

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3d2e55;">
        
        <div class="container">
            <a class="navbar-brand" href="/">Kitchenette</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                </ul>
                
                <li  class="nav-item  dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle fa-2x"  style="color: white;"></i></a>
                    
                    @auth
                        
                    
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">My Account</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('passchg') }}">Password Change</a></li>
                            
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('orddetails') }}">Order</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">

                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </li>
                        </ul>
                    @else
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ 'user/auth' }}">Login & Register</a></li>
                    </ul>
                    @endauth
                </li>




            </div>
        </div>
    
    </nav>
    <!-- Nav close Bootstrap CSS -->




    <br><br><br><br><br>





    <div class="container">
        <div class="row dd-flex justify-content-center">
            <div class="col-md-8">
                <div class="card px-3">
                    <div class="row">

                        @php
                            $menus=\App\Models\Menu::where('id',$menu->id)->first();
                        @endphp

                        <div class="col-md-6">
                            
                            <div class="d-flex flex-row align-items-center"> 
                                <span class="fw-bold ms-1 fs-6">{{ \App\Models\User::where('id',$menus->vendor_id)->value('full_name') }}</span>
                            </div>

                            
                            
                                <div class="d-flex flex-row align-items-center"> 
                                    <span class="ms-1 fs-6">{{ \App\Models\City::where('id',$menus->city_id)->value('name') }}</span>
                                </div>
                    
                            
                            

                            <h1 class="fs-1 ms-1 mt-2">{{ $menus->title }}</h1>
                            <div class="ms-1"> <span>{{ $menus->description }}</span>
                            </div>
                            <br>
                            <div class="row">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="fw-bold ms-1 fs-5">
                                        <a href="/photos/{{ $menus->photo }}" class="btn btn-outline-primary btn-sm">
                                            
                                            <h5 class="text-grey">View Menu</h5>
                                        </a>
                                    </span>
                                </div>


                            </div>

                            <br>
                            <div class="row">
                                <div class="d-flex flex-row align-items-center col-md-3">

                                    <span class="font-weight-bold">
                                        <i class="fas fa-tag" style="color: green;"></i>
                                    
                                    </span><h5 class="text-grey mt-1 mr-1 ml-1">{{ $menus->discount }}%</h5>
                                </div>

                                <div class="col-md-3">


                                    <h5 class="text-grey fw-light text-decoration-line-through">₹{{ $menus->price }}</h5>



                                </div>
                                <div class="col-md-3">


                                    <h5 class="text-success fw-bold">₹{{ $menus->offer_price }}</h5>



                                </div>
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-3"> 
                                    
                                    <button class="button">     
                                        <a class="btn" style="color: white;" href="{{ "../letord/".$menus['id'] }}">
                                            <span>Order Now</span> 
                                        </a> 
                                    </button> 
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="product-image"> <img src="{{ asset('./frontendcss/image/food3.png') }}"> </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>








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