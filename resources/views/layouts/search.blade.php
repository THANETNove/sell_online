<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="{{url('/search')}}" method="post">
                        @csrf
                        <input type="search" name="search" id="search" placeholder="ค้นหาข้อมูลสินค้า">
                        <button type="submit"><img src="../assets/img/core-img/search.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>