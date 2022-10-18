@extends('layouts.app2')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-12 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7 col-lg-12 mb-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">เพิ่ม สินค้า 🎉   <span style="float:right;"> <a href="{{url('/home')}}" class="btn btn-sm btn-outline-primary">สินค้าหมด</a></span></h5>
                                <form method="POST" action="{{'add_product' }}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="main_menu"
                                            class="col-md-4 col-form-label text-md-end">{{ __('เมนูหลัก') }}</label>
                                        <div class="col-md-6">
                                            <select id="id_main_menu" class="form-select form-select-lg"
                                                name="id_main_menu">
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->main_menu }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="sub_menu"
                                            class="col-md-4 col-form-label text-md-end">{{ __('เมนูย่อย') }}</label>
                                        <div class="col-md-6">
                                            <select id="id_sub_menu" class="form-select form-select-lg" name="id_sub_menu">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('ชื่อสินค้า') }}</label>
                                        <div class="col-md-6">
                                            <input id="#" type="text"
                                                class="form-control @error('product_name') is-invalid @enderror"
                                                name="product_name" value="{{ old('product_name') }}" required
                                                autocomplete="name" placeholder="ชื่อสินค้า" autofocus>

                                            @error('product_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="price"
                                            class="col-md-4 col-form-label text-md-end">{{ __('ราคาสินค้า') }}</label>
                                        <div class="col-md-6">
                                            <input id="#" type="number"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                value="{{ old('price') }}" required autocomplete="ราคาสินค้า" placeholder="ราคาสินค้า"  autofocus>
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name_details"
                                            class="col-md-4 col-form-label text-md-end">{{ __('รายละเอียดสินค้า') }}</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="name_details"
                                            placeholder="รายละเอียดสินค้า" autocomplete="รายละเอียดสินค้า"></textarea>
                                            @error('name_details')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name_details_more"
                                            class="col-md-4 col-form-label text-md-end">{{ __('รายละเอียดสินค้า เพิ่มเติม') }}</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="name_details_more"
                                            placeholder="รายละเอียดสินค้า เพิ่มเติม" autocomplete="name_details_more"></textarea>
                                            @error('name_details_more')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="sub_menu"
                                            class="col-md-4 col-form-label text-md-end">{{ __('เพิ่มสินค้าใน Index') }}</label>
                                        <div class="col-md-6">
                                            <select id="product_home" class="form-select form-select-lg"
                                                name="product_home">
                                                <option value="NO">NO</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="sub_menu"
                                            class="col-md-4 col-form-label text-md-end">{{ __('สถานะสินค้า') }}</label>
                                        <div class="col-md-6">
                                            <select id="product_home" class="form-select form-select-lg"
                                                name="status_product">
                                                <option value="ไม่มีสถานะ">ไม่มีสถานะ</option>
                                                <option value="new">New</option>
                                                <option value="สินค้าหมด">สินค้าหมด</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="images"
                                            class="col-md-4 col-form-label text-md-end">{{ __('รูปภาพ (PNG,JPEG,JPG)') }}</label>
                                        <div class="col-md-6">
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image" required>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('บันทึก') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {

                let main_menu = document.getElementById("id_main_menu").value;
                get_Sub_menu(main_menu)
                $("#id_main_menu").change(function() {
                    let brandId = document.getElementById("id_main_menu").value;
                    get_Sub_menu(brandId)
                });
            });

            function get_Sub_menu(e) {
                console.log("AAAA", e);
                $.ajax({
                    url: "{{ url('get-sub_menu') }}",
                    method: "post",
                    data: {
                        id: e,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        if (data.length > 0) {

                            console.log("data", data);
                            var name;
                            for (let index = 0; index < data.length; index++) {
                                name +=
                                    `<option value="${data[index].id}">${data[index].sub_menu}</option>`;
                            }
                            $('#id_sub_menu').html(name);
                        } else {
                            var name = `<option  value="null">ไม่มีเมนูย่อย</option>`;
                            $('#id_sub_menu').html(name);
                        }

                    }
                });
            }
        </script>
    @endsection
