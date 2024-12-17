@extends('layouts.admin.admin')

@section('main')
<div class="container">
    <h2>Management User</h2>
{{-- 
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}


    

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Membership</th>
                <th>End_date_membership</th>
                <th>Fee</th>
                <th>brrowing_media</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->membership }}</td>
                <td>{{ $user->end_date_membership }}</td>     
                <td>{{ $user->fee }}</td>
                <td>{{ $user->borrowing_media}}</td>
               <td> <a href="" class="btn btn-success">Manage</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
