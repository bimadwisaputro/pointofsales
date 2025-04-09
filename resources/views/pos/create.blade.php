@extends('layouts.main')
@section('title', 'Point Of Sale')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-5">
                <div class="card effectup ">
                    <div class="card-body">
                        <h5 class="card-title">Select Categories</h5>
                        <div align="right" class="mt-2">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        </form>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Category Name *</label>
                            <select name="category_id" id="category_id" class="form-control select2tags">
                                <option value="">Select One</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="col-form-label">Product Name *</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">Select One</option>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <button class="btn btn-success add-row" type="button">Add to Cart</button>
                        </div>
                        <input type="hidden" id="hiddenproduct">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card effectup ">
                    <div class="card-body">
                        <h5 class="card-title">Order Cart</h5>
                        <table class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody id="tbodys">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4"> Subtotal</th>
                                    <td colspan="2">
                                        <input type="number" name="" id="subtotal" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4"> Grand Total</th>
                                    <td colspan="2">
                                        <input type="number" name="" id="grandtotal" class="form-control">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
