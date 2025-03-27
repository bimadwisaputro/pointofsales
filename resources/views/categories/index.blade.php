@extends('layouts.main')
@section('title', 'Categories')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card effectup">
                    <div class="card-body">
                        <h5 class="card-title">Data {{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div class="mb-3" align="right">
                                <a href="{{ route('categories.create') }}" class="btn btn-success">Add Categories</a>
                            </div>
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($data as $rowcat)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $rowcat->name }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('categories.destroy', $rowcat->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                                <a href="{{ route('categories.edit', $rowcat->id) }}"
                                                    class="btn btn-primary"><i class="bi bi-pencil"></i></a>
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
