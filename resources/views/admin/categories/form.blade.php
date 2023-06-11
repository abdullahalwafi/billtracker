@extends('admin.layouts.app')
@section('title')
    Categories
@endsection
@include('admin.categories.script')
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
                            <h4 class="card-title">{{ isset($category) ? 'Edit' : 'Add' }} @yield('title')</h4>
                        </div>
                        <hr>
                    </div>
                    <form action="{{ isset($category) ? url('admin/categories/form/update', $category->slug) : url('admin/categories/form/store') }}" method="post">
                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-4 col-form-label">Nama</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ isset($category) ? $category->nama : old('nama') }}">
                                    @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('nama') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="slug" class="col-4 col-form-label">Slug</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ isset($category) ? $category->slug : old('slug') }}" readonly>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-secondary mx-2" href="{{ url('/admin/categories')}}">Back</a>
                            <button class="btn btn-primary">Add Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
