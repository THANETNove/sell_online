<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')


</head>

<body>
    @include('layouts.navbar2') 
    <!-- Search Wrapper Area Start -->
    @include('layouts.search')
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                @include('layouts.logo2') 
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <div class="w-768">
            <header class="header-area clearfix">
                <!-- Close Icon -->
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
                <!-- Logo -->
                <div class="logo">
                    @include('layouts.logo2')

                </div>
                <!-- Amado Nav -->
                @include('layouts.navbar')
                <!-- Button Group -->
                <!-- Cart Menu -->
                @include('layouts.icon_link')
            </header>
        </div>
        <!-- Header Area End -->

        <!-- Product Details Area Start -->
        <div class="single-product-area  clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/shop')}}">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">white modern product</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 col-lg-7">
                            <div class="single_product_thumb">
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                    @php
                                    $data = json_decode($product->images);
                                    $li = 0;
                                    $jl = 0;
                                    @endphp
                                     
                                     <ol class="carousel-indicators">
                                        @foreach ($data as $key => $img)
                                            @php
                                            $il = $jl++;
                                            $classActive = "";
                                            if ($key == 0) {
                                                $classActive = "active";
                                            }
                                            @endphp
                                            <li class="{{$classActive}}" {{-- id="ig_{{$il}}" --}}  onclick="myFunction({{$il}})" data-target="#product_details_slider" data-slide-to="{{$il}}"
                                                style="background-image: url('{{ asset('/images/product/' . '' .$img) }}');">
                                            </li>
                                        @endforeach
                                    </ol>
                                     <div class="carousel-inner">
                                        @foreach ($data as $key => $img)
                                        @php
                                        /* $con = $img. */
                                        $li_l = $li++;
                                        $classActive = "";
                                        if ($key == 0) {
                                                $classActive = "active";
                                            }
                                        @endphp
                                        <div class="carousel-item {{$classActive}}" >
                                            <a  class="gallery_img"  href="{{ URL::asset('/images/product/' . '' .$img) }}">
                                                <img class="d-block"  src="{{ URL::asset('/images/product/' . '' . $img) }}"
                                                    alt="First slide">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="single_product_desc">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    {{--     <p class="product-price">$180</p> --}}
                                    @if ($product->price_discount !== null)
                                        <h4 class="product-price">{{ $product->discount }} &nbsp;&nbsp;<span
                                                class="line-text">{{ $product->price }}</span>&nbsp;&nbsp;
                                            {{ $product->price_discount }}</h4>
                                    @else
                                        <h4 class="product-price">{{ $product->price }}</h4>
                                    @endif
                                    <h5>{{ $product->product_name }}</h5>
                                    <!-- Ratings & Review -->
      {{--                               <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>

                                    </div> --}}
                                    <!-- Avaiable -->
                                    <p class="avaibility"><i class="fa fa-circle"></i>
                                        @if ($product->status_product === 'new')
                                            <span style="color:blue;">New</span>
                                        @elseif($product->status_product === 'สินค้าหมด')
                                            <span style="color:red;">{{ $product->status_product }}</span>
                                        @else
                                            In Stock
                                        @endif
                                    </p>
                                </div>
                                <br>
                            {{--  <div class="review">
                                    <span>{{ $product->main_menu }}<br>{{ $product->sub_menu }}</span>
                                </div>
                            --}}
                                <div class="short_overview my-4">
                                    @if ($product->name_details !== null)
                                        <h6 style="color: #fbb710">รายละเอียดสินค้า</h6>
                                        <p>{{ $product->name_details }}</p>
                                    @endif
                                </div>

                                <div class="short_overview my-4">
                                    @if ($product->name_details_more !== null)
                                        <h6 style="color: #fbb710">รายละเอียดสินค้า เพิ่มเติม</h6>
                                        <p>{{ $product->name_details_more }}</p>
                                    @endif
                                </div>

                                <!-- Add to Cart Form -->{{-- href="{{ url('https://line.me/R/ti/p/@883kwbfl') }}" target="_blank" --}}
                                <form class="cart clearfix" action="{{ url('https://line.me/R/ti/p/@883kwbfl') }}"
                                    target="_blank">
                                    <button type="submit" name="addtocart" value="5"
                                        class="btn amado-btn">ซื้อสินค้า</button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <!-- ##### Newsletter Area End ##### -->
  
    @include('layouts.footer')
    <!-- ##### Footer Area End ##### -->

    @include('layouts.js')



</body>

</html>
