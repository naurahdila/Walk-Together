@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center text-primary">Create New Role</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Role</button>
            </form>
        </div>
    </div>
</div>
@endsection
