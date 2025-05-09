@extends('layouts.main')
@section('title', 'Level')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card effectup">
                    <div class="card-body">
                        <h5 class="card-title">Add New {{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div class="row">
                                <form action="{{ route('roles.store') }}" method="post">
                                    @csrf
                                    <div class="col-12 mb-3">
                                        <label for="name" class="mb-2"> Level Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Level Name" required>
                                    </div>
                                    <div class="col-12 mb-3 text-center">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
