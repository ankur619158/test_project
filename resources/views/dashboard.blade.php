@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>date of birth</th>   
                    <th>address</th>
                    <th>state</th>
                    <th>gender</th>   
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $user)
                    <tr>
                        <td scope="row">{{ $user->id }} </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->dob }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->gender }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
