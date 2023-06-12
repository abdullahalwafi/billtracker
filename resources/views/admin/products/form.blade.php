@extends('admin.layouts.app')
@section('title')
    Products
@endsection
@include('admin.products.script')
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
                            <h4 class="card-title">{{ isset($product) ? 'Edit' : 'Add' }} @yield('title')</h4>
                        </div>
                        <hr>
                    </div>
                    <form
                        action="{{ isset($product) ? url('admin/products/form/update', $product->slug) : url('admin/products/form/store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($product))
                            @method('PUT')
                        @endif
                        <div class="form-group row mb-3">
                            <label for="slug" class="col-4 col-form-label">Slug</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ isset($product) ? $product->slug : old('slug') }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama" class="col-4 col-form-label">Nama</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ isset($product) ? $product->nama : old('nama') }}">
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('nama') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="categories_id" class="col-4 col-form-label">Product Category</label>
                            <div class="col-8">
                                <select class="form-control" id="categories_id" name="categories_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('categories_id', isset($product) ? $product->categories_id : '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('categories_id') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="harga_beli" class="col-4 col-form-label">Harga_beli</label>
                            <div class="col-8">
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                    value="{{ isset($product) ? $product->harga_beli : old('harga_beli') }}">
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('harga_beli') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="harga_jual" class="col-4 col-form-label">Harga_jual</label>
                            <div class="col-8">
                                <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                                    value="{{ isset($product) ? $product->harga_jual : old('harga_jual') }}">
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('harga_jual') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="stok" class="col-4 col-form-label">Stok</label>
                            <div class="col-8">
                                <input type="number" class="form-control" id="stok" name="stok"
                                    value="{{ isset($product) ? $product->stok : old('stok') }}">
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('stok') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="imgproducts" class="col-4 col-form-label">Imgproducts</label>
                            <div class="col-8">
                                <input type="file" class="col-8 form-control" id="imgproducts" name="imgproducts[]"
                                    multiple>
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('imgproducts') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label">Deskripsi</label>
                            <div class="col-md-8">
                                <textarea class="classic-editor" id="deskripsi" name="deskripsi"
                                    value="{{ isset($product) ? $product->deskripsi : old('deskripsi') }}">{{ isset($product) ? $product->deskripsi : old('deskripsi') }}</textarea>
                                @if (count($errors) > 0)
                                    <i class="text-danger"><small>{{ $errors->first('deskripsi') }}</small></i>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-secondary mx-2" href="{{ url('/admin/products') }}">Back</a>
                            <button class="btn btn-primary">Add Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
