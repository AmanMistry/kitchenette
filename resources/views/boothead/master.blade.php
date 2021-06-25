


<!DOCTYPE html>
<html lang="en">
<head>
    @include('boothead.head')
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/admin" class="btn btn-dark">
                Dashboard
            </a>
          
        </div>
      </nav>

    @yield('content')

   

    @include('boothead.footer')
    
</body>
</html>