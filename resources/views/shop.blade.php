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
            <!-- Cart Menu -->
            <!-- Social Button -->
            @include('layouts.icon_link')
        </header>
        <!-- Header Area End -->

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        @foreach ($menus as $menu)
                            <li><a href="{{ '/search' . '/' . $menu->main_menu }}">{{ $menu->main_menu }}</a></li>
                            @foreach ($submenus as $sub)
                                @if ($menu->id == $sub->id_main_menu)
                                    <li><a href="{{ '/search' . '/' . $sub->sub_menu }}">&nbsp;- {{ $sub->sub_menu }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>





            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Price</h6>

                <div class="widget-desc">
                    <div class="slider-range">
                        <div data-min="10" data-max="1000" data-unit="$"
                            class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                            data-value-min="10" data-value-max="1000" data-label-result="">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">$10 - $1000</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort by</p>
                                    <form action="{{url('/search')}}" method="post">
                                        @csrf
                                        <select name="search" id="sortBydate" onchange="myFunction()">
                                            <option value="date">Date</option>
                                            <option value="new">Newest</option>
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
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                   <a href="{{url('/product', $product->id)}}">
                                        <img src="{{ URL::asset('/images/product/' . '' . $product->images) }}"
                                        alt="">
                                   </a>
                                    <!-- Hover Thumb -->

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
                                            <p class="product-price ">{{$product->discount}} &nbsp;&nbsp;<span  class="line-text">{{$product->price}}</span>&nbsp;&nbsp; {{$product->price_discount}}</p>
                                        @else
                                            <p class="product-price">{{$product->price}}</p>
                                        @endif
                                        <a href="{{url('/product', $product->id)}}">
                                            <h6>{{ $product->product_name }}</h6>
                                        </a>
                                    </div>
                                    <!-- Ratings & Cart -->
                                    <div class="ratings-cart text-right">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <?php
                                $url_GET = $_SERVER['REQUEST_METHOD'];
                                $url_name = $_SERVER['PHP_SELF'];
                                ?>
                                @if ($url_GET === 'GET')
                                    @if ($url_name === '/index.php/shop')
                                        {!! $products->links() !!}
                                    @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->


    <!-- ##### Newsletter Area End ##### -->
    @include('layouts.footer')
    <!-- ##### Footer Area End ##### -->

    @include('layouts.js')

    <script>
        function myFunction() {
            console.log("888");
            $('#search-post').click(); 
         /*  var x = document.getElementById("mySelect").value;
          document.getElementById("demo").innerHTML = "You selected: " + x; */
        }
        </script>
</body>

</html>
