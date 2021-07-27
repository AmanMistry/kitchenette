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
    
    
    <link rel="stylesheet" href="./frontendcss/style.css">
    <title>Kitchenette</title>
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
                            
                            <li><a class="dropdown-item" href="{{ route('profile') }}">{{Auth::user()->full_name}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profile') }}">My Account</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('passchg') }}">Password Change</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/orddetails">Order</a></li>
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

    <!-- carousel Bootstrap CSS -->

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="./frontendcss/image/banner2.jpg" class="d-block w-100" alt="...">
            </div>

               @foreach(\App\Models\Banner::get() as $banner)
                
                    <div class="carousel-item">
                        <img src="/photos/{{ $banner->photo }}" class="d-block w-100" alt="{{ $banner->title }}">
                    </div>
                @endforeach 
            

            

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- carousel close Bootstrap CSS -->
    <br>
    <br><br>
    <!-- body search and filter Bootstrap CSS -->




            

            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-8">



                    
                        
                        <table class="table">
                            <tr>
                                <form action="{{ url('searchcty') }}" method="get">
                                    <th><select name="query" type="text" placeholder="search by City" class="form-control show-trick ">
                                        <option value="">Search City</option>
                                        
                                        @foreach (\App\Models\Menu::get() as $menus)
                                        <option value="{{ $menus->city_id }}">{{ \App\Models\City::where('id',$menus->city_id)->value('name') }}</option> 
                                        @endforeach
                                        
                                        
                                    </select></th>
                                    <th><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button></th>
                                </form>
                            </tr>
                        </table>


                        


                    </div>
                </div>
            </div>

        




    <!-- body search and filter close Bootstrap CSS -->


    <br>
    <br>
    <!-- card close Bootstrap CSS -->

    @if (isset($menu))
    <div class="container">
        <h1 class="display-6 text-left">Near you services</h1>
        <div class="row">
          
            @foreach ($menu as $menus)
                <div class="col">
                    <div class="wrapper">
                        <div class="card text-center">
                            
                            <div class="image"> <img src="./frontendcss/image/food3.png" width="300"> </div>
                            <div class="about-product text-center">
                                {{ \App\Models\City::where('id',$menus->city_id)->value('name') }}
                                <h3>{{ $menus->title}}</h3>
                                <h4>₹{{ $menus->price}}</h4> 
                                <a class="btn btn-success buy-now" href="{{ route("showord.show",$menus->id) }}">
                                    <h6>View</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
               
           
            
            

        </div>
    </div>
    @endif
   


    <!--  card  close Bootstrap CSS -->


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