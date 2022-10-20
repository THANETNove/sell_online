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
                                <h5 class="card-title text-primary">ชื่อเว็บไชต์ 🎉    <span style="float:right;" > <a href="{{url('/create-website-name')}}"  style="display:none" class="btn btn-sm btn-outline-primary">เพิ่มชื่อเว็บไชต์</a></span></h5>

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
                                                        <th>ชื่อเว็บไชต์</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach ($webName as $name)
                                                        <tr>
                                                            <td> {{ ++$i }}</td>
                                                            <td>{{$name->web_names }}</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('/edit-web-name', $name->id) }}"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
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
