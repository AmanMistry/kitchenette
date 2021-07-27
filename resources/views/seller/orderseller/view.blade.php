<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="style.css">
    
     <!--slider css-->
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="{{ asset('./frontendcss/orderview.css') }}">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Kitchenette</title>
  </head>
  <body>
    
   
    
    <!--Main order-->
      <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
        <div class="text-uppercase">
            <p>Order detail</p>
        </div>
        <div class="h4">{{$order->ord_date}}</div>
        {{-- <div class="pt-1">
            <p>Your Order is<b class="text-dark"> Successful</b></p>
        </div> --}}
        
    </div>
    <div class="wrapper bg-white">
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-uppercase text-muted">
                        <th scope="col"><b>Menu Details</b></th>
                        <th scope="col" class="text-right"><b>Price</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">Menu Id</th>
                        <th scope="col" class="text-right">#{{ $order->menu_id }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Menu Name</th>
                        <th scope="col" class="text-right">{{ \App\Models\Menu::where('id',$order->menu_id)->value('title') }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Menu Price</th>
                        <th scope="col" class="text-right">{{ \App\Models\Menu::where('id',$order->menu_id)->value('price') }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Menu Discount</th>
                        <th scope="col" class="text-right">{{ \App\Models\Menu::where('id',$order->menu_id)->value('discount') }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Menu Offer price</th>
                        <th scope="col" class="text-right">{{ \App\Models\Menu::where('id',$order->menu_id)->value('offer_price') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pt-2 border-bottom mb-3"></div>

        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-uppercase text-muted">
                        <th scope="col"><b>Users</b></th>
                        <th scope="col" class="text-right"><b> Details</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col" class="text-right">{{ \App\Models\User::where('id',$order->user_id)->value('full_name') }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User E-mail</th>
                        <th scope="col" class="text-right">{{ $order->email }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User Phone Number</th>
                        <th scope="col" class="text-right">{{ $order->phone }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User Flat_no</th>
                        <th scope="col" class="text-right">{{ $order->flat_no }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User Area</th>
                        <th scope="col" class="text-right">{{ $order->area }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User Landmark</th>
                        <th scope="col" class="text-right">{{ $order->landmark }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User pincode</th>
                        <th scope="col" class="text-right">{{ $order->pincode }}</th>
                    </tr>
                    <tr>
                        <th scope="col">User City</th>
                        <th scope="col" class="text-right">{{ \App\Models\City::where('id',$order->city_id)->value('name') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="pt-2 border-bottom mb-3"></div>
        <div class="d-flex justify-content-start align-items-center pl-3">
            <div class="text-muted">Payment Method</div>
            <div class="ml-auto"><label>{{ $order->payment }}</label> </div>
        </div>
        <div class="d-flex justify-content-start align-items-center pb-4 pl-3 border-bottom">
            <div class="text-muted"> <button class="text-white btn">{{ \App\Models\Menu::where('id',$order->menu_id)->value('discount') }}% Discount</button> </div>
            <div class="ml-auto price"> ₹{{ \App\Models\Menu::where('id',$order->menu_id)->value('offer_price') }} </div>
        </div>
        <div class="d-flex justify-content-start align-items-center pl-3 py-3 mb-4 border-bottom">
            <div class="text-muted"> Total </div>
            <div class="ml-auto h5">{{ $order->package }} </div>
        </div>
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start"> <b>Shipping Address</b>
                    <p class="text-justify pt-2">
                        {{ \App\Models\User::where('id',$order->user_id)->value('full_name') }},
                        {{ $order->flat_no }}
                        {{ $order->area }},
                        {{ $order->landmark }},
                        {{ $order->pincode }},
                        
                    </p>
                    <p class="text-justify">{{ \App\Models\City::where('id',$order->city_id)->value('name') }}</p>
                </div>
            </div>
        </div>
       
    </div>

    
    

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>