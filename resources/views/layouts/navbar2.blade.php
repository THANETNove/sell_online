<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      @include('layouts.logo') 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" >
        <ul class="navbar-nav" >

          <li class="nav-item text-margin">
            <a class="nav-link  text-a"  id="home" href="{{url('/')}}" >หน้าหลัก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-a"  id="shop" href="{{url('/shop')}}" >สินค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-a" id="support" href="{{ url('https://line.me/R/ti/p/@883kwbfl') }}" target="_blank">ข้อมูลและประวัติร้าน</a>
          </li>
        </ul>
      </div>
      <div class="d-flex" role="search">
        <div class="cart-fav-search mb-25" style='margin-top:10px;'>
        <a href="#" class="search-nav" style='font-size:25px;margin-right: 20px;color:#FFFFFF;' ><img src="../assets/img/core-img/search.png" height="25px" width="25px" alt="">&nbsp;&nbsp;ค้นหา</a>
    </div>
  </div>
    </div>
  </nav>