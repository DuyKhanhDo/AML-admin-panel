@extends('layouts.admin.admin')

@section('main')
<div class="container mt-5">
    <h2 class="mb-4">Create Categories</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <!-- thể loại truyện -->
        <div class="mb-3">
            <label for="LoaiCanHo" class="form-label">name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập thể loại truyện" required>
        </div>

        <!-- Nút Lưu -->
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('category') }}" class="btn btn-secondary">Cencal</a>
    </form>
</div>
@endsection
