@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Orders <span>| Today</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $total_sum[0]->totalorder }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Total</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| Today</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ number_format($total_sum[0]->totalrevenue) }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Total</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Products <span>| All</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $total_sum[0]->totalproduct }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Total</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Customers Card -->
                    <!-- Recent Sales -->
                    <div class="col-6">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body" style="height:300px">
                                <h5 class="card-title">Last 10 Orders <span>| Today</span></h5>
                                <table class="table table-borderless ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Total Item</th>
                                            <th scope="col">Total Qty</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1 @endphp
                                        @if (is_iterable($last10order))
                                            @forelse($last10order as $rowcat)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $rowcat->order_code }}</td>
                                                    <td>{{ $rowcat->totalpenjualan }}</td>
                                                    <td>{{ $rowcat->totalqty }}</td>
                                                    <td>{{ number_format($rowcat->order_amount) }}</td>
                                                    <td>{{ $rowcat->order_date }}</td>
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
                    </div><!-- End Recent Sales -->
                    <div class="col-6">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body" style="height:300px">
                                <h5 class="card-title">Stok Product <span>| All</span></h5>
                                <table class="table table-borderless  ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Qty Awal</th>
                                            <th scope="col">Qty Jual</th>
                                            <th scope="col">Qty Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1 @endphp
                                        @if (is_iterable($stokproduk))
                                            @forelse($stokproduk as $rowcat)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $rowcat->product_name }}</td>
                                                    <td>{{ $rowcat->qty_awal }}</td>
                                                    <td>{{ $rowcat->qty_keluar }}</td>
                                                    <td>{{ $rowcat->qty_akhir }}</td>
                                                </tr>
                                            @empty
                                                <tr>
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
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                </div>
            </div><!-- End Left side columns -->
            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Budget Report -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body pb-0">
                            <h5 class="card-title">Top 5 Product <span>| Favorite</span></h5>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @if (is_iterable($top5product))
                                        @forelse($top5product as $rowcat)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td>{{ $rowcat->product_name }}</td>
                                                <td>{{ number_format($rowcat->product_price) }}</td>
                                                <td>{{ $rowcat->totalpenjualan }}</td>
                                                <td>{{ $rowcat->totalqty }}</td>
                                                <td>{{ number_format($rowcat->totalsubtotal) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
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
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body pb-0">
                            <h5 class="card-title">Top 5 Category <span>| Favorite</span></h5>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @if (is_iterable($top5category))
                                        @forelse($top5category as $rowcat)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td>{{ $rowcat->name }}</td>
                                                <td>{{ $rowcat->totalpenjualan }}</td>
                                                <td>{{ $rowcat->totalqty }}</td>
                                                <td>{{ number_format($rowcat->totalsubtotal) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
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
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Top Selling -->
            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
