@extends('layouts.main')
@section('title', 'Pos')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card effectup ">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div align="right" class="mb-3">
                                <a class="btn btn-primary" href="{{ route('pos.create') }}">Add pos</a>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td>{{ $index += 1 }}</td>
                                            <td>{{ $data->order_code }}</td>
                                            <td>{{ $data->order_date }}</td>
                                            <td>{{ $data->order_amount }}</td>
                                            <td>{{ $data->status ? 'Paid' : 'Unpaid' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('pos.show', $data->id) }}"
                                                    class="btn btn-sm btn-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="{{ route('pos.edit', $data->id) }}" class="btn btn-sm btn-success">
                                                    <i class="bi bi-file"></i>
                                                </a>
                                            </td>
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
