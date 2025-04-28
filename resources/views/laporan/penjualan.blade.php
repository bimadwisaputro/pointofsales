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
                                    <label for="typereport">Report Type</label>
                                    <select name="typereport" class="form-control" id="typereport">
                                        <option value="custom" {{ $typereport == 'custom' ? 'selected' : '' }}>Custom Date
                                        </option>
                                        <option value="date" {{ $typereport == 'date' ? 'selected' : '' }}>Daily</option>
                                        <option value="week" {{ $typereport == 'week' ? 'selected' : '' }}>Weekly</option>
                                        <option value="month" {{ $typereport == 'month' ? 'selected' : '' }}>Monthly
                                        </option>
                                    </select>
                                </div>

                                <div class="col-3 reportfilter datediv" style="display:none;">
                                    <label for="datefrom">Date</label>
                                    <input type="date" class="form-control" value="{{ $date }}" name="date"
                                        id="date">
                                </div>
                                <div class="col-3 reportfilter weekdiv" style="display:none;">
                                    <label for="datefrom">Week</label>
                                    <input type="week" id="week" class="form-control" value="{{ $week }}"
                                        name="week" id="week">
                                </div>
                                <div class="col-3 reportfilter monthdiv" style="display:none;">
                                    <label for="datefrom">Month</label>
                                    <input type="month" class="form-control" value="{{ $month }}" name="month"
                                        id="month">
                                </div>

                                <div class="col-3 reportfilter customdiv">
                                    <label for="datefrom">Date From</label>
                                    <input type="date" class="form-control" value="{{ $datefrom }}" name="datefrom"
                                        id="datefrom">
                                </div>
                                <div class="col-3 reportfilter customdiv">
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
            @if (is_iterable($data))
                <div class="col-lg-12">
                    <div class="card effectup">
                        <div class="card-body">
                            <h5 class="card-title">Summary</h5>
                            <div class="mt-4 mb-3">
                                <table class="table table-bordered table-striped datatablebutton">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Total Transaction</th>
                                            <th>Total Qty</th>
                                            <th>Total Penjualan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totaltransaction = 0;
                                            $totalqty = 0;
                                            $totalpenjualan = 0;
                                        @endphp
                                        @forelse($summarylist as $rowsum)
                                            <tr>
                                                <td>{{ $rowsum->order_date }}</td>
                                                <td>{{ number_format($rowsum->totaltransaction) }}</td>
                                                <td>{{ number_format($rowsum->totalqty) }}</td>
                                                <td>{{ number_format($rowsum->totalpenjualan) }}</td>
                                            </tr>
                                            @php
                                                $totaltransaction = $totaltransaction + $rowsum->totaltransaction;
                                                $totalqty = $totalqty + $rowsum->totalqty;
                                                $totalpenjualan = $totalpenjualan + $rowsum->totalpenjualan;
                                            @endphp
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                        <tr>
                                            <td>Total</td>
                                            <td>{{ number_format($totaltransaction) }}</td>
                                            <td>{{ number_format($totalqty) }}</td>
                                            <td>{{ number_format($totalpenjualan) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
