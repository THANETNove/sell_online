@extends('layouts.app2')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-12 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">สินค้า 🎉 
                                    <span style="float:right;">
                                        <form action="{{url('/home')}}" method="post">
                                            @csrf
                                            <select name="search" id="sortBydate"  class="form-select form-select-lg" onchange="myFunction()">
                                                <option value="AZ">เรียงลำดับ</option>
                                                <option value="AZ">เรียงลำดับ A-Z</option>
                                                <option value="ZA">เรียงลำดับ Z-A</option>
                                            </select>
                                            <button type="submit" style="display:none" id="search-post"><img src="../assets/img/core-img/search.png" alt=""></button>
                                        </form>
                                    </span>
                                </h5>
                                @php
                                    $i = 0;
                                @endphp
                                <div class="container">
                                    <div class="">
                                        <h5 class="card-header"></h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>ชื่อสินค้า</th>
                                                        <th>ราคา</th>
                                                        <th>ราคาที่ลดเเล้ว</th>
                                                        <th>เปอร์เซ็น ที่ลด</th>
                                                        <th>เมนูหลัก</th>
                                                        <th>เมนูย่อย</th>
                                                        <th>สถานะ</th>
                                                        <th>ภาพสินค้าหน้า Shop</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @inject('sub_manu', 'App\Http\Controllers\AddProductController')
                                                    @foreach ($menus as $menu)
                                                        <tr>
                                                            <td> {{ ++$i }}</td>
                                                            <td>{{ $menu->product_name }}</td>
                                                            <td>{{ $menu->price }}</td>
                                                            <td>{{ $menu->price_discount }}</td>
                                                            <td>{{ $menu->discount }}</td>
                                                            <td><span
                                                                    class="badge bg-label-primary me-1">{{ $menu->main_menu }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($menu->id_sub_menu != null)
                                                                    <span class="badge bg-label-primary me-1">
                                                                        {{ $sub_manu->getSubManu($menu->id_sub_menu) }}
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($menu->status_product === 'สินค้าหมด')
                                                                    <span
                                                                        style="color:red;">{{ $menu->status_product }}</span>
                                                                @elseif ($menu->status_product === 'new')
                                                                    <span
                                                                        style="color:rgb(43, 158, 2);">{{ $menu->status_product }}</span>
                                                                @elseif ($menu->status_product === 'สินค้าขายดี')
                                                                    <span
                                                                        style="color:blue;">{{ $menu->status_product }}</span>
                                                                
                                                                @endif
                                                            </td>
                                                            @php
                                                            $data = json_decode($menu->images);
                                                            $data =  $data[0];
                                                           /*  dd($data); */
                                                            @endphp
                                                            <td>
                                                                <img src="{{ URL::asset('/images/product/' . '' . $data) }}"
                                                                    height="90px" width="80px">
                                                            </td>
                                                           
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('/edit-product', $menu->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item"
                                                                            onClick="javascript:return confirm('ข้อมูลสินค้า   {{ $menu->product_name }} ทั้งหมด จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                                            href="{{ url('/destroy-product', $menu->id) }}"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                            <?php
                                            $url_GET =  $_SERVER['REQUEST_METHOD'];
                                            ?>
                                            @if ($url_GET === "GET")
                                                {!! $menus->links() !!}
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>

                function myFunction() {
                    console.log("888");
                    $('#search-post').click(); 
                }
                </script>
        @endsection
