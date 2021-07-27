<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('./frontendcss/profile.css') }}">

    <title>kitchenette</title>
    
</head>
<body id="body-pd" class="bg-white">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Kitchenette</span> </a>
                <div class="nav_list"> <a href="/seller" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ route('sellermenu.index') }}" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Menus</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Orders</span> </a>
                    <a href="{{ route('selprofile') }}" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                    <a href="{{ route('selchgpass') }}" class="nav_link"> <i class='bx bx-fingerprint nav_icon'></i> <span class="nav_name">Change Password</span> </a>
                    <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> 
                            <i class='bx bx-log-in nav_icon'></i> 
                            <span class="nav_name">{{ __('Logout') }}</span> 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div> 
        </nav>
    </div>
<!--seller Add Menu start-->
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                
               
                ADD menu

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
                <form action="{{ route('sellermenu.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Menu Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Menu title"value="{{ old('title') }}"/>

                    </div>
                    <br>
                    <div class="form-group">
                        <label for="description">Menu Description</label>
                        <textarea name="description" placeholder="Write some text here..." class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="description">Menu Image</label>
                        <div class="input-group">
                            <input class="form-control" type="file" name="photo" multiple />
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="price">Menu Price</label>
                        <input type="number" step="any" name="price" class="form-control" placeholder="Enter menu price"value="{{ old('price') }}"/>
                    </div>
                    
                    <br>

                    <div class="form-group">
                        <label for="discunt">Menu Discount</label>
                        <input type="number" step="any" name="discount" class="form-control" placeholder="Enter discount"value="{{ old('discount') }}"/>
                    </div>
                    
                    <br>

                    <div class="form-group">
                        <label for="cat_id">Menu category</label>
                        <select name="cat_id" class="form-control show-trick ">
                            <option value="">--Categorys list--</option>
                            
                            @foreach (\App\Models\Category::get() as $menu)
                            <option value="{{ $menu->id }}">(type):{{ $menu->type}} ,(meal):{{ $menu->meal }}</option> 
                            @endforeach
                            
                            
                        </select>
                    </div>
                    
                    <br>

                    <div class="form-group">
                        <label for="city_id">Menu City</label>
                        <select name="city_id" class="form-control show-trick ">
                            <option value="">--City list--</option>
                            
                            @foreach (\App\Models\City::get() as $city)
                            <option value="{{ $city->id }}">{{ $city->name}}</option> 
                            @endforeach
                            
                            
                        </select>
                    </div>
                    
                    <br>

                    @php
                        $username=Auth::user()->id; 
                    @endphp
                

                    <div class="form-group">
                        <label for="vendor_id">Vendors</label>
                        <select name="vendor_id" class="form-control show-trick ">
                            <option value="">--Your Name--</option>
                            
                            
                            @foreach (\App\Models\User::where('id',$username)->get() as $vendor)
                            <option value="{{ $vendor->id }}" >{{ $vendor->full_name }}</option> 
                            @endforeach
                            
                            
                        </select>
                    </div>
                    
                    <br>
                    

                    <div class="form-group">
                        <label for="status">Menu Status</label>
                        <select name="status" class="form-control show-trick ">
                            <option value="">--Menu status list--</option>
                            <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>InActive</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Add Menu</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!--seller Add menu end-->
    

<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

:root {
    --header-height: 3rem;
    --nav-width: 68px;
    --first-color: #4e73df;
    --first-color-light: #AFA5D9;
    --white-color: #F7F6FB;
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;
    --z-fixed: 100
}

*,
::before,
::after {
    box-sizing: border-box
}

body {
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s
}

a {
    text-decoration: none
}

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: var(--white-color);
    z-index: var(--z-fixed);
    transition: .5s
}

.header_toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer
}

.header_img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden
}

.header_img img {
    width: 40px
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background-color: var(--first-color);
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed)
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden
}

.nav_logo,
.nav_link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem
}

.nav_logo {
    margin-bottom: 2rem
}

.nav_logo-icon {
    font-size: 1.25rem;
    color: var(--white-color)
}

.nav_logo-name {
    color: var(--white-color);
    font-weight: 700
}

.nav_link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1.5rem;
    transition: .3s
}

.nav_link:hover {
    color: var(--white-color)
}

.nav_icon {
    font-size: 1.25rem
}

.show {
    left: 0
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem)
}

.active {
    color: var(--white-color)
}

.active::before {
    content: '';
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color)
}

.height-100 {
    height: 100vh
}

@media screen and (min-width: 768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem)
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
    }

    .header_img {
        width: 40px;
        height: 40px
    }

    .header_img img {
        width: 45px
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0
    }

    .show {
        width: calc(var(--nav-width) + 156px)
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px)
    }
}
</style>

</body>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});
</script>
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
</html>
