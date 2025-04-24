@extends('layouts.main')
@section('title', 'Level')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card effectup">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div class="mb-3" align="right">
                                <a href="{{ route('roles.create') }}" class="btn btn-success">Add Level</a>
                            </div>
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Level</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($datas as $rowcat)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $rowcat->name }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('roles.destroy', $rowcat->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                                <a href="{{ route('roles.edit', $rowcat->id) }}" class="btn btn-primary"><i
                                                        class="bi bi-pencil"></i></a>
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
