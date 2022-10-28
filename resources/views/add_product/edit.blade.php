@extends('layouts.app2')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-12 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">เเก้ไข สินค้า 🎉  <span style="float:right;"> <a href="{{url('/home')}}" class="btn btn-sm btn-outline-primary">ย้อนกลับ</a></span></h5>
                                <p id="id-product" style="display:none">{{$product->id}}</p>
                                <form method="POST" action="{{url('/update-product',$product->id )}}"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="main_menu"
                                            class="col-md-4 col-form-label text-md-end">{{ __('เมนูหลัก') }}</label>
                                        <div class="col-md-6">
                                            <select id="id_main_menu" class="form-select form-select-lg"
                                                name="id_main_menu">
                                                @foreach ($menus as $menu)
                                                @if ($menu->id == $product->id_main_menu)
                                                 <option value="{{ $menu->id }}" selected>{{ $menu->main_menu }}</option>
                                                @endif
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
                                                name="product_name" value="{{$product->product_name }}" required
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
                                            <input id="#" type="text"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                value="{{$product->price }}" required autocomplete="ราคาสินค้า" placeholder="ราคาสินค้า"  autofocus>
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
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="name_details"
                                            placeholder="รายละเอียดสินค้า" autocomplete="รายละเอียดสินค้า">{{$product->name_details }}</textarea>
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
                                            placeholder="รายละเอียดสินค้า เพิ่มเติม" autocomplete="name_details_more">{{$product->name_details_more }}</textarea>
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
                                           {{--      <option value="ไม่มีสถานะ">ไม่มีสถานะ</option>
                                                <option value="new">New</option>
                                                <option value="สินค้าหมด">สินค้าหมด</option> --}}
                                                @if ($product->status_product === "ไม่มีสถานะ")
                                                    <option value="ไม่มีสถานะ" selected>ไม่มีสถานะ</option>
                                                    <option value="สินค้าขายดี">สินค้าขายดี</option>
                                                    <option value="new">New</option>
                                                    <option value="สินค้าหมด">สินค้าหมด</option>
                                                @elseif ($product->status_product === "new")
                                                    <option value="ไม่มีสถานะ">ไม่มีสถานะ</option>
                                                    <option value="สินค้าขายดี">สินค้าขายดี</option>
                                                    <option value="new" selected>New</option>
                                                    <option value="สินค้าหมด">สินค้าหมด</option>
                                                @elseif ($product->status_product === "สินค้าขายดี")
                                                    <option value="ไม่มีสถานะ">ไม่มีสถานะ</option>
                                                    <option value="สินค้าขายดี">สินค้าขายดี</option>
                                                    <option value="new" selected>New</option>
                                                    <option value="สินค้าหมด">สินค้าหมด</option>
                                                @else
                                                    <option value="ไม่มีสถานะ">ไม่มีสถานะ</option>
                                                    <option value="สินค้าขายดี">สินค้าขายดี</option>
                                                    <option value="new">New</option>
                                                    <option value="สินค้าหมด" selected>สินค้าหมด</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="images"
                                            class="col-md-4 col-form-label text-md-end">{{ __('รูปภาพ Shop (PNG,JPEG,JPG) *') }}</label>
                                        <div class="col-md-6">
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image[]" multiple>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                                </span>
                                            @enderror
                                            <h6 style="color:#F08080;margin-top: 10px;">ขนาด ภาพ ที่ เเนะนำสำหรับ หน้า Shop   ภาพขนาด&nbsp;723*747<br></h6>
                                        </div>
                                    </div>
{{--                                     <div class="row mb-3">
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


        <script>
            $(document).ready(function() {

                let main_menu = document.getElementById("id_main_menu").value;
                var id_product = document.getElementById("id-product").innerHTML;

                /* console.log("id_product",id_product); */
                get_Sub_menu(main_menu,id_product)
                $("#id_main_menu").change(function() {
                    let brandId = document.getElementById("id_main_menu").value;
                    get_Sub_menu(brandId,id_product)
                });
            });

            function get_Sub_menu(e,j) {
                console.log("AAAA", e);
                $.ajax({
                    url: "{{ url('get-sub_menu_edit') }}",
                    method: "post",
                    data: {
                        id: e,
                        id_product: j,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        console.log("aa",data);

                        let index_submanu = data[0];
                        let data1 = data[1];
                        if (data1.length > 0) {
                            var name ;
                            for (let index = 0; index < data1.length; index++) {
                                let id = data1[index].id;
                                console.log("index",index_submanu,id);
                                    if (index_submanu == id) {
                                        name += (
                                    `<option value="${data1[index].id}" selected>${data1[index].sub_menu}</option>`
                                    );
                                }else{
                                    name += (
                                   `<option value="${data1[index].id}">${data1[index].sub_menu}</option>`
                                );
                                }
                                
                                   
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
