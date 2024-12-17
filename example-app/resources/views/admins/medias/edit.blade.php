@extends('layouts.admin.admin')

@section('main')
<div class="container mt-5">
    <h2 class="mb-4">Edit Media</h2>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('media.update', $media->id) }}">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $media->title }}" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">-- Select category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $media->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Author -->
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $media->author }}" required>
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $media->amount }}" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="1" {{ $media->status == 1 ? 'selected' : '' }}>Available</option>
                <option value="0" {{ $media->status == 0 ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        

        <!-- Nút Lưu -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('media') }}" class="btn btn-secondary">
            Cancel</a>
    </form>
</div>
@endsection
