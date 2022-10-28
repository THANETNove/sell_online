<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')


</head>

<body>

    @include('layouts.navbar2')
    <!-- Search Wrapper Area Start -->

    <!-- Search Wrapper Area End -->
    @include('layouts.search')
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper  clearfix">

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
        <!-- Header Area Start -->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($images as $key => $img)
                    @php
                        $classActive = '';
                        if ($key == 0) {
                            $classActive = 'active';
                        }
                    @endphp
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key + 1 }}"
                        class="{{ $classActive }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">

                @foreach ($images as $key => $img)
                    @php
                        $classActive = '';
                        if ($key == 0) {
                            $classActive = 'active';
                        }
                    @endphp
                    <div class="carousel-item {{ $classActive }}">
                        <img class="d-block w-100" src="{{ URL::asset('/images/home/' . '' . $img) }}" alt="First slide">
                    </div>
                @endforeach

                {{--              <div class="carousel-item">
                <img class="d-block w-100" src="{{ URL::asset('/images/home/Manchester-Double-Drive-Tem-1.png') }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ URL::asset('/images/home/Marlboro-Dry-Menthol-tem.jpeg') }}" alt="Third slide">
              </div> --}}
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Header Area End -->



        <div class="manu-product">
            <div class="col-10 col-lg-10 col-xl-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <br>
                                    <br>
                                    <br>
                                    <h4>สินค้าขายดี</h4>
                                    <div class="view d-flex">
                                        <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- Sorting -->
                                <div class="product-sorting d-flex">
                                    <div class="sort-by-date d-flex align-items-center mr-15">
                                        <p>&nbsp;</p>
                                        <form action="{{url('/sort')}}" method="post">
                                            @csrf
                                            <select name="searchSort" id="sortBydate" onchange="myFunction()">
                                                <option value="AZ">เรียงลำดับ A-Z</option>
                                                <option value="ZA">เรียงลำดับ Z-A</option>
                                            </select>
                                            <button type="submit" style="display:none" id="search-post"><img src="../assets/img/core-img/search.png" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Single Product Area -->
                        @foreach ($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        @php
                                        $data = json_decode($product->images);
                                        $data =  $data[0];
                                       /*  dd($data); */
                                        @endphp
                                       <a href="{{url('/product', $product->id)}}">
                                            <img src="{{ URL::asset('/images/product/' . '' . $data) }}"
                                            alt="">
                                       </a>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description d-flex align-items-center justify-content-between">
                                        <!-- Product Meta Data -->
                                        
                                        <div class="product-meta-data">
                                            @if ($product->status_product === 'new')
                                                 <span style="color:blue;">New</span>
                                            @elseif($product->status_product === 'สินค้าหมด')
                                                <span style="color:red;">{{ $product->status_product }}</span>
                                            @endif
                                            <div class="line"></div>
                                          {{--   <p class="product-price">$180</p> --}}
    
                                            @if($product->price_discount !== NULL)
                                                <p class="product-price ">ราคา {{$product->discount}} &nbsp;&nbsp;<span  class="line-text">{{$product->price}}</span>&nbsp;&nbsp; {{$product->price_discount}}</p>
                                            @else
                                                <p class="product-price">ราคา {{$product->price}}</p>
                                            @endif
                                            <a href="{{url('/product', $product->id)}}">
                                                <h6>{{ $product->product_name }}</h6>
                                            </a>
                                        </div>
                                        <!-- Ratings & Cart -->
{{--                                         <div class="ratings-cart text-right">
                                            <div class="ratings">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="cart">
                                                <a href="cart.html" data-toggle="tooltip" data-placement="left"
                                                    title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <?php
                        $url_GET = $_SERVER['REQUEST_METHOD'];
                        ?>
                        @if ($url_GET === 'GET')
                                {!! $products->links() !!}
                        @endif
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>

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
    <script>

        function myFunction() {
            console.log("888");
            $('#search-post').click(); 
        }
        </script>
    <!-- ##### Main Content Wrapper End ##### -->
    @include('layouts.footer')
    <!-- ##### Footer Area End ##### -->

    @include('layouts.js')
</body>

</html>
