<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head') 


</head>

<body>
    <!-- Search Wrapper Area Start -->

    <!-- Search Wrapper Area End -->
    @include('layouts.search')
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                @include('layouts.logo') 
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                @include('layouts.logo') 

            </div>
            <!-- Amado Nav -->
       
            @include('layouts.navbar') 
            <!-- Button Group -->
            <!-- Cart Menu -->
            @include('layouts.icon_link') 
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
             {{--    @foreach ($products as $menu)
                <div class="single-products-catagory clearfix">
                    <a href="{{url('/product', $menu->id)}}">
                        <img src="{{ URL::asset('/images/home/' . '' . $menu->images_home) }}" 
                         alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>ราคา  {{$menu->price}}</p>
                            <h5>{{$menu->product_name}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach --}}

           
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer') 
    <!-- ##### Footer Area End ##### -->

    @include('layouts.js') 
</body>

</html>