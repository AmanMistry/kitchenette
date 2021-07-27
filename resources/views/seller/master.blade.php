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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>kitchenette</title>
    
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
   
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">

            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Kitchenette</span> </a>
                <div class="nav_list"> <a href="/seller" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ route('sellermenu.index') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Menus</span> </a>
                    <a href="{{ route('sellerorder.index') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Orders</span> </a>
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
<!--seller Dashboard start-->
<div class="container">

    <div class="row row-cols-3">

        <div class="col">  
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="container justify-content-center">
                    <div class="card p-2">
                        <div class="p-info px-3 py-3">
                            
                            <div class="p-price d-flex flex-row">
                                <h3> Menu </h3>
                            </div>
                            <div class="heart"> <i class="bx bx-menu"></i> </div>
                        </div>
                        <div class="text-center p-image"> <img src="./frontendcss/image/food5.png"> </div>
                        <div class="p-about">
                            <h4><p>Here You can add yours items or menu</p></h4>
                        </div>
                        <div class="buttons d-flex flex-row gap-3 px-3"><a class="btn btn-outline-primary w-100" href="{{ route('sellermenu.index') }}" role="button">View Menu</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">  
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="container  justify-content-center">
                    <div class="card p-2">
                        <div class="p-info px-3 py-3">
                            
                            <div class="p-price d-flex flex-row">
                                <h3> Order </h3>
                            </div>
                            <div class="heart"> <i class="bx bx-cart"></i> </div>
                        </div>
                        <div class="text-center p-image"> <img src="./frontendcss/image/food4.png"> </div>
                        <div class="p-about">
                            <h4><p>Here You can see yours orders</p></h4>
                        </div>
                        <div class="buttons d-flex flex-row gap-3 px-3"><a class="btn btn-outline-primary w-100" href="{{ route('sellerorder.index') }}" role="button">View Order</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">  
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="container justify-content-center">
                    <div class="card p-2">
                        <div class="p-info px-3 py-3">
                            
                            <div class="p-price d-flex flex-row">
                                <h3> Profile</h3>
                            </div>
                            <div class="heart"> <i class="bx bx-user"></i> </div>
                        </div>
                        <div class="text-center p-image"> <img src="./frontendcss/image/food3.png"> </div>
                        <div class="p-about">
                            <h4><p>Your profile View</p></h4>
                        </div>
                        <div class="buttons d-flex flex-row gap-3 px-3"><a class="btn btn-outline-primary w-100" href="{{ route('selprofile') }}" role="button">Click Me!</a> </div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>   

</div>


<!--seller Dashboard End-->
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

<!------------------------------------seller Dashboard Card style------------------------------------------>
<style>
    .card {
    width: 350px;
    border: none;
    height: 350px;
    border-radius: 3px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    background: #eae7ee;
}

.p-info {
    display: flex;
    justify-content: space-between
}

.p-price {
    position: absolute;
    right: 10px;
    top: 20px
}

.heart i {
    font-size: 50px;
    opacity: 0;
    color: #3d2e55
}

.heart i:hover {
    color: #3d2e55
}

.p-image img {
    width: 240px;
    transform: rotate(15deg);
    transition: all 0.5s
}

.card:hover .heart i {
    animation: heart 300ms ease-in forwards;
    animation-delay: 500ms
}

.p-about {
    position: absolute;
    width: 170px;
    font-size: 10px;
    top: 140px;
    left: -125px;
    opacity: 0
}

.card:hover .p-about {
    animation: content 300ms ease-in forwards
}

@keyframes content {
    0% {
        opacity: 0
    }

    100% {
        opacity: 1;
        left: 25px
    }
}

@keyframes heart {
    0% {
        opacity: 0
    }

    100% {
        opacity: 1
    }
}

.card:hover .p-image img {
    animation: onimage 300ms ease-in forwards
}

.card:hover .p-price {
    animation: onprice 500ms ease-in forwards
}

@keyframes onprice {
    0% {
        right: 10px;
        top: 20px
    }

    50% {
        right: 60px;
        top: 30px
    }

    100% {
        right: 267px;
        top: 70px
    }
}

@keyframes onimage {
    0% {
        width: 250px
    }

    50% {
        width: 200px;
        transform: translateY(-30px);
        transform: translateX(100px)
    }

    100% {
        width: 180px;
        top: 100px;
        transform: translateY(100px);
        transform: translateX(110px)
    }
}

.buttons {
    position: absolute;
    bottom: -150px;
    
}

.card:hover .buttons {
    animation: buttons 500ms ease-in forwards;
    
}

@keyframes buttons {
    0% {
        bottom: -100px
    }

    100% {
        bottom: 20px
    }
}

.btn {
    height: 50px;
    font-size: 16px;
    width: 140px !important;
    font-weight: 600;
}
</style>
<!--seller Dashboard Card style-->
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
