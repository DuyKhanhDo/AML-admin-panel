@extends('layouts.admin.admin')

@section('main')
<div class="container">
    <h2>Management Categories</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('category.create') }}" class="btn btn-success mb-3">Create Categories</a>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td>{{ $categorie->name }}</td>
                <td>
                    <a href="{{ route('category.edit', $categorie->id) }}" class="btn btn-warning">Update</a>
                    <form action="{{ route('category.destroy', $categorie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
