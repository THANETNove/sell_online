<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')


</head>

<body>
    <!-- Search Wrapper Area Start -->
    @include('layouts.search')
    <!-- Search Wrapper Area End -->

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

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item"><a href="#">Chairs</a></li>
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
                                    $li = 1;
                                    $jl = 1;
                                   /*  dd($data); */
                                    @endphp
                                     
                                     <ol class="carousel-indicators">
                                        @foreach ($data as $img)
                                            @php
                                            /* $con = $img. */
                                            $il = $jl++
                                            @endphp
                                            <li class="" id="ig_{{$il}}"  onclick="myFunction({{$il}})" data-target="#product_details_slider" data-slide-to="0"
                                                style="background-image: url('{{ asset('/images/product/' . '' .$img) }}');">
                                            </li>
                                        @endforeach
                                    </ol>
                                     <div class="carousel-inner">
                                        @foreach ($data as $img)
                                        @php
                                        /* $con = $img. */
                                        $li_l = $li++
                                        @endphp
                                        <div class="carousel-item" id="mg_{{$li_l}}">
                                            <a  class="gallery_img"  href="{{ URL::asset('/images/product/' . '' .$data[0]) }}">
                                                <img class="d-block"  src="{{ URL::asset('/images/product/' . '' . $data[0]) }}"
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
                                    <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>

                                    </div>
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
                                <div class="review">
                                    <span>{{ $product->main_menu }}<br>{{ $product->sub_menu }}</span>
                                </div>

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
    <script>
        $("#ig_1").addClass("active");
        $("#mg_1").addClass("active");

        function myFunction(e,j) {
             
                console.log(j,e);
            if (e == "1") {    
                $("#ig_1").addClass("active");
                $("#ig_2").removeClass("active");
                $("#ig_3").removeClass("active");

                $("#mg_1").addClass("active");
                $("#mg_2").removeClass("active");
                $("#mg_3").removeClass("active");
                console.log("1");
            }else if(e == "2") {
                $("#ig_1").removeClass("active");
                $("#ig_2").addClass("active");
                $("#ig_3").removeClass("active");

                
               /*  $("#mg_1").removeClass("active");
                $("#mg_2").addClass("active");
                $("#mg_3").removeClass("active"); */

             
         /*         */
        
                console.log("2");
            }else{
                $("#ig_1").removeClass("active");
                $("#ig_2").removeClass("active");
                $("#ig_3").addClass("active");

              /*   $("#img_1").removeClass("active");
                $("#img_2").removeClass("active");
                $("#img_3").addClass("active"); */
                console.log("3");
            }
         /*    console.log("555");
            $("#ig_"+e).addClass("active");
            $("#img_1"+e).addClass("active"); */
            }
    </script>
    @include('layouts.footer')
    <!-- ##### Footer Area End ##### -->

    @include('layouts.js')



</body>

</html>
