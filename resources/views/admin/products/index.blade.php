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
                            <h4 class="card-title">Data @yield('title')</h4>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <a class="btn btn-primary btn-sm" href="{{url('/admin/products/form')}}"><i class="uil-plus">Add Data</i></a>
                        </div>
                        <hr>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style=" border-collapse: collapse; border-spacing: 0; width: 100%; ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>History</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->nama }}</td>
                                    <td>Rp.{{ number_format($product->harga_beli), 0, ',', '.' }}</td>
                                    <td>Rp.{{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>{{ $product->categories->nama }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url('/admin/products/form', $product->slug) }}"><i class="uil-pen"></i></a>
                                        <form action="{{ url('/admin/products/destroy', $product->id) }}"
                                            class="d-inline" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                onclick="if(!confirm('Are you sure you want to delete the {{ $product->nama }} data?')) {return false};"
                                                class="btn btn-danger btn-sm"><i class="uil-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
