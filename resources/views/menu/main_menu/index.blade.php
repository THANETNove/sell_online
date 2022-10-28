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
                                <h5 class="card-title text-primary">เมนูหลัก 🎉 </h5>

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
                                                        <th>เมนูหลัก</th>
                                                        <th style="text-align: center">ลำดับ</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach ($menus as $menu)
                                                        <tr>
                                                            <td> {{ ++$i }}</td>
                                                            <td>{{$menu->main_menu }}</td>
                                                            <td>
                                                                <form method="POST" action="{{url('update-sort_manu',$menu->id)}}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row justify-content-md-center">
                                                                        <div class="col-md-3">
                                                                            <input id="main_menu" type="text" class="form-control  @error('main_menu') is-invalid @enderror" name="sort_manu" value="{{ $menu->sort_manu}}" required>
                                                                        </div> 
                                                                        <div class="col-md-2">
                                                                            <button type="submit" class="btn btn-primary">
                                                                                {{ __('บันทึก') }}
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
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
                                                                            href="{{ url('/edit-main_menu', $menu->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" onClick="javascript:return confirm('เมนูย่อย ที่เกี่ยวกับ เมนูหลัก   {{ $menu->main_menu }} ทั้งหมด จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                                                            href="{{url('/destroy-main_menu',$menu->id)}}"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
