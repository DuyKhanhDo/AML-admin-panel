@extends('layouts.admin.admin')

@section('main')
<div class="container mt-5">
    <h2 class="mb-4">Edit Categories</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('category.update', $categories->id) }}">
        @csrf
        @method('PUT') 

        <!-- Thể loại truyện -->
        <div class="mb-3">
            <label for="LoaiCanHo" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('LoaiCanHo', $categories->name) }}" placeholder="nhập thể loại truyện " required>
        </div>

        

        <!-- Nút Lưu -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category') }}" class="btn btn-secondary">Cancal</a>
    </form>
</div>
@endsection
