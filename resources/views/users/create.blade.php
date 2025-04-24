@extends('layouts.main')
@section('title', 'Users')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card effectup">
                    <div class="card-body">
                        <h5 class="card-title">Add New {{ $title ?? '' }}</h5>
                        <div class="mt-4 mb-3">
                            <div class="row">
                                <form action="{{ route('users.store') }}" method="post">
                                    @csrf
                                    <div class="col-12 mb-3">
                                        <label for="name" class="mb-2"> Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="email" class="mb-2"> Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="password" class="mb-2"> Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label> 
                                        <select class="form-control blogsform select2tags" data-placeholder="Pilih Role" name="role_id[]" multiple="multiple" id="role">
                                            <option value="" disabled  >Pilih Role</option>
                                            @foreach ($roles as $role) 
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
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
