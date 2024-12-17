@extends('layouts.admin.admin')

@section('main')
<div class="container">
    <h2>Management Medias</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <a href="{{ route('media.create') }}" class="btn btn-success mb-3">creact media</a>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Author</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medias as $media)
            <tr>
                <td>{{ $media->id }}</td>
                <td>{{ $media->title }}</td>
                <td>{{ $media->category->name}}</td>
                <td>{{ $media->author }}</td>
                <td>{{ $media->amount  }}</td>
                <td>   @if ($media->amount == 0)
                    <span class="text-danger">Unavailable</span>
                @else
                <span class="text-danger">Available</span>
                @endif</td>
                <td>
                    <a href="{{ route('media.edit', $media->id) }}" class="btn btn-warning">Update</a>
                    <form action="{{ route('media.destroy', $media->id) }}" method="POST" style="display:inline;">
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
