@extends('layouts.main')
@section('title', 'Order Details')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header effectup d-flex justify-content-beetwen align-item-center">
                    <div class="col-6">
                        <h3 class="card-title">{{ $title ?? '' }}</h3>
                    </div>
                    <div class="col-6" align="right">
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                        <a href="{{ route('print', $data->id) }}" target="blank_" class="btn btn-success">
                            <i class="bi bi-printer"></i>
                        </a>
                    </div>
                </div>
                <div class="card effectup mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Order</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order Code</th>
                                    <td>{{ $data->order_code }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $data->order_date }}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{{ $data->order_status ? 'Paid' : 'Unpaid' }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card effectup ">
                    <div class="card-body">
                        <h5 class="card-title">Order Details</h5>
                        <table class="table table-bordered table-hover ">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($dataDetail as $index => $row)
                                    <tr class="text-center">
                                        <td>{{ $index += 1 }}</td>
                                        <td>
                                            <div class="circular"><a
                                                    href="{{ asset('storage/' . $row->product->product_photo) }}"
                                                    data-fancybox>
                                                    <img width="100"
                                                        src="{{ asset('storage/' . $row->product->product_photo) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </td>
                                        <td style="text-align:left;">{{ $row->product->product_name }}</td>
                                        <td>{{ $row->qty }}</td>
                                        <td style="text-align:right;">{{ number_format($row->order_price) }}</td>
                                        <td style="text-align:right;">{{ number_format($row->order_subtotal) }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5"> Grand Total</th>
                                    <td colspan="1" style="text-align:right;">
                                        <span id="grandtotal">{{ number_format($data->order_amount) }}</span>
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
