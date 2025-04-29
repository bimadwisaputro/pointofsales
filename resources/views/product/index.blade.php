@extends('layouts.main')
@section('title', 'Data Products')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div align="right" class="mb-3">
                                @if (array_intersect(['Administrator'], session('session_roles', [])))
                                    <a class="btn btn-primary" href="{{ route('product.create') }}">Add Product</a>
                                @endif
                            </div>
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stok Awal</th>
                                        <th>Qty Jual</th>
                                        <th>Stok Akhir</th>
                                        <th>Status</th>
                                        @if (array_intersect(['Administrator'], session('session_roles', [])))
                                            <th></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td>{{ $index += 1 }}</td>
                                            <td>
                                                <div class="circular"><a
                                                        href="{{ asset('storage/' . $data->product_photo) }}" data-fancybox>
                                                        <img width="100"
                                                            src="{{ asset('storage/' . $data->product_photo) }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $data->category->name }}</td>
                                            <td>{{ $data->product_name }}</td>
                                            <td>{{ number_format($data->product_price) }}</td>
                                            <td>{{ $data->qty_awal }}</td>
                                            <td>{{ $data->qty_keluar }}</td>
                                            <td>{{ $data->qty_akhir }}</td>
                                            <td>{{ $data->is_active ? 'Publish' : 'Draft' }}</td>
                                            @if (array_intersect(['Administrator'], session('session_roles', [])))
                                                <td class="text-center">
                                                    <a href="{{ route('product.edit', $data->id) }}"
                                                        class="btn btn-sm btn-secondary">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form class="d-inline"
                                                        action="{{ route('product.destroy', $data->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
