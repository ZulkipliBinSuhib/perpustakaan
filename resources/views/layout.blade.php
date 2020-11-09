<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('layout/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    


    <link rel="stylesheet" href="{{ asset('layout/vendors/fontawesome/css/all.min.css')}}">
    
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('layout/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('layout/css/responsive.css')}}">

</head>

<body>
   <!--================Header Menu Area =================-->
   
   <header class="header_area col">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-left text-center col-12">
                    <span class="dn_btn"> Welcome {{ Auth::user()->name }}</span>
                </div>
                <div class="float-right">
                   
                </div>
            </div>	
        </div>	
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ route ('home')}} "><img src="{{ asset('layout/img/logo perpus.jpg')}}" alt="" width="60px" height="60px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto ">
                            <li class="nav-item "><a class="nav-link" href=" {{ route('home') }}">Home</a></li> 
                            @if(Auth::user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li> 
                            @endif
                            

                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Master</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('buku.index')}}">Data buku</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('peminjam.index')}}">Data Peminjam</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('peminjaman.index')}} ">Data Peminjaman</a></li>
                                    
                                </ul>
                            </li>  
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>    
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->

    <section class="d-flex align-items-center">
    <!-- <section class="banner-area d-flex align-items-center"> -->

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xl-6">
                <h2>APLIKASI MANAJEMEN BUKU</h2>
                                <h3>PERPUSTAKAAN GALUH</h3>
                    
                </div>
            </div>
        </div>
    </section>

    <!--================End Home Banner Area =================-->

    <!--================ Service section start =================-->  

    <div class=" area-padding-top">
        <div class="container">
            <div class="card">
                @yield('title')
                @yield('content')
                
            </div>
    </div>    
    
    <!--================ Service section end =================-->      

    <!--================Header Menu Area =================-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('layout/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ asset('layout/js/popper.js')}}"></script>
    <script src="{{ asset('layout/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https:////cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  



</body>



</html>
