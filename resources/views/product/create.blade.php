@extends('layouts.main')
@section('title', 'Add New Product')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Add New Product</h5>
                        <div align="right" class="mt-2">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="col-form-label">Product Name *</label>
                                <input type="text" class="form-control" name="product_name"
                                    placeholder="Enter Product Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Category Name *</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">product Price *</label>
                                <input type="number" class="form-control" name="product_price"
                                    placeholder="Enter Product Price" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Product Description </label>
                                <input type="text" class="form-control" name="product_description"
                                    placeholder="Enter Product Description">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="" class="col-form-label">Qty Awal</label>
                                    <input type="number" class="form-control" onchange="caculate_stok_akhir()"
                                        name="qty_awal" id="qty_awal" value="0" placeholder="0">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="" class="col-form-label">Qty Keluar</label>
                                    <input type="number" class="form-control" onchange="caculate_stok_akhir()"
                                        name="qty_keluar" id="qty_keluar" value="0" placeholder="0">
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="" class="col-form-label">Qty Akhir</label>
                                    <input type="number" class="form-control" name="qty_akhir" id="qty_akhir"
                                        value="0" placeholder="0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Product Photo </label>
                                <input type="file" name="product_photo">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Status </label>
                                <br>
                                Publish <input type="radio" name="is_active" value="1" checked>
                                Draft <input type="radio" name="is_active" value="0">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save </button>
                                <button class="btn btn-danger" type="reset">Cancel </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
