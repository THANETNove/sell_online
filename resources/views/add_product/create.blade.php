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
                                            class="col-md-4 col-form-label text-md-end">{{ __('ชื่อสินค้า *') }}</label>
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
                                            class="col-md-4 col-form-label text-md-end">{{ __('ราคาสินค้า *') }}</label>
                                        <div class="col-md-6">
                                            <input id="#" type="text"
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
                                        <label for="discount"
                                            class="col-md-4 col-form-label text-md-end">{{ __('ส่วนลด %') }}</label>
                                        <div class="col-md-6">
                                            <input id="#" type="text"
                                                class="form-control @error('discount') is-invalid @enderror" name="discount"
                                                value="{{ old('discount') }}"  autocomplete="ส่วนลด %" placeholder="ส่วนลด %"  autofocus>
                                            @error('discount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="price_discount"
                                            class="col-md-4 col-form-label text-md-end">{{ __('ราคาที่ลดเเล้ว') }}</label>
                                        <div class="col-md-6">
                                            <input id="#" type="text"
                                                class="form-control @error('price_discount') is-invalid @enderror" name="price_discount"
                                                value="{{ old('price_discount') }}"  autocomplete="ราคาที่ลดเเล้ว" placeholder="ราคาที่ลดเเล้ว"  autofocus>
                                            @error('price_discount')
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
                                            <textarea class="form-control" id="particulars" id="exampleFormControlTextarea1" rows="4" name="name_details"
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
                                            <textarea class="form-control" id="name_details_more" rows="4" name="name_details_more"
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
                                            class="col-md-4 col-form-label text-md-end">{{ __('สถานะสินค้า') }}</label>
                                        <div class="col-md-6">
                                            <select id="product_home" class="form-select form-select-lg"
                                                name="status_product">
                                                <option value="ไม่มีสถานะ">ไม่มีสถานะ</option>
                                                <option value="สินค้าขายดี">สินค้าขายดี</option>
                                                <option value="new">New</option>
                                                <option value="สินค้าหมด">สินค้าหมด</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="images"
                                            class="col-md-4 col-form-label text-md-end">{{ __('รูปภาพ Shop (PNG,JPEG,JPG) *') }}</label>
                                        <div class="col-md-6">
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image[]" multiple required>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                                </span>
                                            @enderror
                                            <h6 style="color:#F08080;margin-top: 10px;">ขนาด ภาพ ที่ เเนะนำสำหรับ หน้า Shop   ภาพขนาด&nbsp;723*747<br></h6>
                                        </div>
                                    </div>
                                {{--     <div class="row mb-3">
                                        <label for="image_home"
                                            class="col-md-4 col-form-label text-md-end">{{ __('รูปภาพ Home (PNG,JPEG,JPG)') }}</label>
                                        <div class="col-md-6">
                                            <input class="form-control @error('image_home') is-invalid @enderror" type="file" id="formFile" name="image_home">
                                            @error('image_home')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                                </span>
                                            @enderror
                                            <h6 style="color:#F08080;margin-top: 10px;">ขนาด ภาพ ที่ เเนะนำสำหรับ หน้า Home <br>
                                                <br>
                                                ภาพที่&nbsp;1.&nbsp;&nbsp;ขนาด&nbsp;533*533<br>
                                                ภาพที่&nbsp;2.&nbsp;&nbsp;ขนาด&nbsp;533*757<br>
                                                ภาพที่&nbsp;3.&nbsp;&nbsp;ขนาด&nbsp;489*435<br>
                                                ภาพที่&nbsp;4.&nbsp;&nbsp;ขนาด&nbsp;489*453<br>
                                                ภาพที่&nbsp;5.&nbsp;&nbsp;ขนาด&nbsp;533*533<br>
                                                ภาพที่&nbsp;6.&nbsp;&nbsp;ขนาด&nbsp;533*475<br>
                                                ภาพที่&nbsp;7.&nbsp;&nbsp;ขนาด&nbsp;533*757<br>
                                                ภาพที่&nbsp;8.&nbsp;&nbsp;ขนาด&nbsp;533*641<br>
                                                ภาพที่&nbsp;9.&nbsp;&nbsp;ขนาด&nbsp;533*475<br><br>
                                                ถ้าต้องใส่ภาพมากกว่านี้ ให้วนอีกรอบ เช่น 
                                                <br>ภาพที่&nbsp;10&nbsp;&nbsp;ขนาดเท่ากับภาพที่&nbsp;&nbsp;1 
                                                <br>ภาพที่&nbsp;11&nbsp;ขนาดเท่ากับภาพขนาดที่&nbsp;&nbsp;2 
                                            </h6>
                                        </div>
                                    </div> --}}
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


        <script  type="text/javascript">
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
            CKEDITOR.replace( 'name_details' );
            CKEDITOR.replace( 'name_details_more' );
        </script>
    @endsection
