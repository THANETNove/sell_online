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
                                <h5 class="card-title text-primary">เพิ่ม ชื่อเว็บไชต์ 🎉  <span style="float:right;"> <a href="{{url('/web-name')}}" class="btn btn-sm btn-outline-primary">ย้อนกลับ</a></span></h5>
                                <form method="POST" action="{{'new-web-name'}}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        <label for="web_names" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อเว็บไชต์') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="web_names" type="text" class="form-control @error('web_names') is-invalid @enderror" name="web_names" value="{{ old('web_names') }}" required autocomplete="name" autofocus>
            
                                            @error('web_names')
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
