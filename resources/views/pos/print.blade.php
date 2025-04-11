<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Struk </title>

    {{-- <link href="{{ asset('assets/adminlte/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adminlte/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adminlte/assets/css/style.css') }}" rel="stylesheet"> --}}
    {{--
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #FFFFFF;
            background-color: RGBA(var(--bs-primary-rgb), var(--bs-bg-opacity, 1)) !important;
            padding: 3px 10px 3px 10px;
            border-radius: 10px;
        }

        .bootstrap-tagsinput {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            display: inline-block;
            padding: 8px 10px;
            color: #555;
            vertical-align: middle;
            border-radius: 4px;
            width: 100%;
            line-height: 22px;
            cursor: text;
        }

        .circular {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: relative;
            overflow: hidden;
            margin: auto;
        }

        .circular img {
            min-width: 100%;
            min-height: 100%;
            width: 70px;
            height: auto;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .swal-wide {
            width: 150px !important;
        }
    </style> --}}
    <style>
        body {
            width: 70mm;
            margin: 0 auto;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            color: #000;

        }

        header {
            text-align: center;
            font-weight: bold;
        }

        header h3 {}

        header p {
            /* margin:0; */
            font-weight: bold;
        }

        .devider {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2px;
        }

        .item-row .left {
            flex: 1;
        }

        .item-row .right {
            flex: 0 0 auto;
            text-align: right;
        }

        footer p {
            margin-top: 10px;
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
            }
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="wrapper">
        <header>
            <h3>TOKO SAYA</h3>
            <p>Jl Karet Baru, Rt 01 Rw 28 Jakarta Pusat</p>
        </header>
        <div class="devider"></div>
        <div>
            <div>Tanggal: {{ date('d-M-Y', strtotime($data->order_date)) }}</div>
            <div>No Transaksi: {{ $data->order_code }}</div>
        </div>
        <div class="devider"></div>
        <div class="item-row">
            <div class="left">Nama Item</div>
            <div class="right">Sub Total</div>
        </div>
        @php $no=1; @endphp
        @foreach ($dataDetail as $index => $row)
            <div class="item-row">
                <div class="left">{{ $row->product->product_name }}</div>
                <div class="right">Rp.{{ number_format($row->order_subtotal) }}</div>
            </div>
            <div class="item-row">
                <div class="left">{{ number_format($row->qty) }} x Rp.{{ number_format($row->order_price) }}</div>
            </div>
        @endforeach
        <div class="devider"></div>
        <div class="item-row">
            <div class="left">Grand Total</div>
            <div class="right">Rp.{{ number_format($data->order_amount) }}</div>
        </div>
        <div class="devider"></div>
        <footer>
            <p>***Terima kasih telah belanja***</p>
        </footer>
    </div>

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class=" text-center">
                <h3 class="card-title">{{ $title ?? '' }}</h3>
            </div>
            <div class="mt-5">
                <div class="">
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
            <div class="effectup ">
                <div class="">
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
    </div> --}}
</body>

</html>
