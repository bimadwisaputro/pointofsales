@extends('layouts.main')
@section('title', 'Laporan Penjualan')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card top-selling overflow-auto effectup">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Filters</h5>
                        <form action="/laporan-penjualan" method="post">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-3">
                                    <label for="datefrom">Date From</label>
                                    <input type="date" class="form-control" value="{{ $datefrom }}" name="datefrom"
                                        id="datefrom">
                                </div>
                                <div class="col-3">
                                    <label for="datefrom">Date To</label>
                                    <input type="date" class="form-control" value="{{ $dateto }}" name="dateto"
                                        id="dateto">
                                </div>
                                <div class="col-2">
                                    <br>
                                    <button type="submit" class="btn btn-primary" id="submitreport" name="submitreport"> <i
                                            class="bi bi-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card effectup">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div class="mb-3" align="right">
                            </div>
                            <table class="table table-bordered table-striped datatablebutton">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Code</th>
                                        <th>Order Date</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @if (is_iterable($data))
                                        @forelse($data as $rowcat)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td>{{ $rowcat->order->order_code }}</td>
                                                <td>{{ $rowcat->order->order_date }}</td>
                                                <td>{{ $rowcat->product->product_name }}</td>
                                                <td>{{ $rowcat->qty }}</td>
                                                <td>{{ number_format($rowcat->order_price) }}</td>
                                                <td>{{ number_format($rowcat->order_subtotal) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
