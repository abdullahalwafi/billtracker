@extends('admin.layouts.app')
@section('title')
    Clients
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">@yield('title')</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">{{ isset($clients) ? 'Edit' : 'Add' }} @yield('title')</h4>
                        </div>
                        <hr>
                    </div>
                    <form action="{{ isset($clients) ? url('admin/clients/form/update', $clients->id) : url('admin/clients/form/store') }}" method="post">
                        @csrf
                        @if (isset($clients))
                            @method('PUT')
                        @endif
                        <div class="form-group row mb-3">
                            <label for="kode" class="col-4 col-form-label">Kode</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="kode" name="kode"
                                    value="{{ isset($clients) ? $clients->kode : old('kode') }}">
                                    @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('kode') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-4 col-form-label">Nama</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ isset($clients) ? $clients->nama : old('nama') }}">
                                    @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('nama') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="phone" class="col-4 col-form-label">Phone</label>
                            <div class="col-8">
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ isset($clients) ? $clients->phone : old('phone') }}">
                                    @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('phone') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ isset($clients) ? $clients->email : old('email') }}">
                                    @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('email') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-4 col-form-label">Alamat</label>
                            <div class="col-8">
                                <textarea class="form-control" id="alamat" name="alamat"
                                    value="{{ isset($clients) ? $clients->alamat : old('alamat') }}">{{ isset($clients) ? $clients->alamat : old('alamat') }}</textarea>
                                    @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('alamat') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-secondary mx-2" href="{{ url('/admin/clients')}}">Back</a>
                            <button class="btn btn-primary">Add Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
