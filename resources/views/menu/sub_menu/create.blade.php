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
                                <h5 class="card-title text-primary">เพิ่ม เมนูย่อย 🎉  <span style="float:right;"> <a href="{{url('/sub-menu')}}" class="btn btn-sm btn-outline-primary">เมนูย่อย ทั้งหมด</a></span></h5>
                                <form method="POST" action="{{'new-sub_menu'}}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        <label for="main_menu" class="col-md-4 col-form-label text-md-end">{{ __('เมนูหลัก') }}</label>
            
                                        <div class="col-md-6">
                                            <select id="largeSelect" class="form-select form-select-lg" name="id_main_menu">
                                                @foreach ($menu as $menu)
                                                <option value="{{$menu->id}}">{{$menu->main_menu}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="sub_menu" class="col-md-4 col-form-label text-md-end">{{ __('เมนูย่อย') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="sub_menu" type="text" class="form-control @error('sub_menu') is-invalid @enderror" name="sub_menu" value="{{ old('username') }}" required autocomplete="name" autofocus>
            
                                            @error('sub_menu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
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
    @endsection
