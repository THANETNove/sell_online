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
                                <h5 class="card-title text-primary">เมนูย่อย 🎉 </h5>
                                
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
                                                        <th>เมนูย่อย</th>
                                                        <th>เมนูหลัก</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach ($menus as $menu)
                                                        <tr>
                                                            <td> {{ ++$i }}</td>
                                                            <td>{{$menu->sub_menu }}</td>
                                                            <td><span
                                                                class="badge bg-label-primary me-1">{{ $menu->main_menu }}</span>
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
                                                                            href="{{ url('/edit-sub_menu', $menu->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" onClick="javascript:return confirm('คุณต้องการลบ  {{ $menu->sub_menu }} ใช่หรือไม่ ! ');"
                                                                            href="{{url('/destroy-sub_menu',$menu->id)}}"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
            </div>
        @endsection
