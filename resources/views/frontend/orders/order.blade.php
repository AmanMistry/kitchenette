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
    <link rel="stylesheet" href="{{ asset('./frontendcss/order.css') }}">
    <title>Order Page</title>
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
                        <a class="nav-link" href="#">Order</a>
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
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>     
    @endif

    <!-- profile start -->
    @php
        $menus=\App\Models\Menu::where('id',$menu->id)->first();
    @endphp
    <div class="wrapper rounded bg-white">
        <form action="{{ route('orderplc.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        
        <div class="h3">Order Form</div>
        <div class="form">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label>Menu Name</label> 
                    <input type="text" name="menu_id" placeholder="{{ $menus->title }}" value="{{ $menus->id }}" class="form-control"  readonly="readonly"> 
                </div>
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label>Seller Name</label> 
                    <input type="text" name="seller_id" value="{{ \App\Models\User::where('id',$menus->vendor_id)->value('id') }}" class="form-control" readonly="readonly" placeholder="{{ \App\Models\User::where('id',$menus->vendor_id)->value('full_name') }}"> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label>First Name</label> 
                    <input type="text" readonly="readonly" class="form-control" name="user_id" value="{{Auth::user()->id}}" placeholder="{{Auth::user()->id}}"> 
                </div>
                
                <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label> 
                    <input type="email" readonly="readonly" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="{{Auth::user()->email}}"> 
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> <label>Oder Date</label> 
                    <input type="date" id="date" name="ord_date" value="{{ old('ord_date') }}" class="form-control" required> 
                </div>
                <div class="col-md-6 mt-md-0 mt-3"> <label>Packing Type</label> 
                    <select id="sub" name="pack_type" required>
                    <option value="NUN" selected hidden>Choose Option</option>
                    <option value="disposal-packing">Disposal packing</option>
                    <option value="tiffin-box">Tiffin Box</option>
                    </select> 
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6 mt-md-0 mt-3"> <label>City</label> 
                    <select id="sub" name="city_id" required>
                    <option value="" selected hidden>Choose Option</option>
                    @foreach (\App\Models\City::get() as $city)
                        <option value="{{ $city->id }}">{{ $city->name}}</option> 
                    @endforeach
                    </select> 
                </div>
                <div class="col-md-6 mt-md-0 mt-3"> <label>Phone Number</label> 
                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control" required> 
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label>Flat/House no., Buliding, Apartment</label> 
                    <input type="text" name="flat_no" value="{{ old('flat_no') }}" class="form-control" placeholder="" required> 
                </div>
                
                <div class="col-md-6 mt-md-0 mt-3"> <label>Area,Street,Sector,Village</label> 
                    <input type="text" name="area" value="{{ old('area') }}" class="form-control" required>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label>Landmark</label> 
                    <input type="text" name="landmark" value="{{ old('landmark') }}" class="form-control" placeholder="" required> 
                </div>
                
                <div class="col-md-6 mt-md-0 mt-3"> <label>Pincode</label> 
                    <input type="number" name="pincode" value="{{ old('pincode') }}" class="form-control" required> 
                </div>

            </div>

            <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Package</label> 
                <select id="sub" name="package" required>
                    <option value="" selected hidden>Choose Option</option>
                    <option value="1-Day (₹{{ ($menu->offer_price) }})">1-Day (₹{{ ($menu->offer_price) }})</option>
                    <option value="1-month (₹{{ ($menu->offer_price*30) }})">1-month (₹{{ ($menu->offer_price*30) }})</option>
                    <option value="6-month (₹{{ ($menu->offer_price*180) }})">6-month (₹{{ ($menu->offer_price*180) }})</option>
                </select> 
            </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Payment Method</label> 
                <input type="text" name="payment" value="Cash On Delevery" class="form-control" placeholder="C.O.D" readonly="readonly"> 
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Order</button>
        </div>
        </div>
    </form>
    </div>
    <!-- end profile body-->

    
    <!-- Optional JavaScript; choose one of the two! -->
    <script>
       var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
            $('#date').datepicker({ 
            startDate: today 
        });
    </script>
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