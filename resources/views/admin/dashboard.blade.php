@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <hr/>
            <h4> Approved Users </h4> 
        </hr>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>UserId</th>
                    <th>name</th>
                    <th>email</th>
                    <th>status</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($approved_users as $user)           
                    <tr>
                        <td scope="row"> {{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }} </td>
                        <td>
                            <li class="nav-item dropdown"> 
                                {{ $user->status }}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('approval').submit();">
                                        {{ __('Reject') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('pending').submit();">
                                        {{ __('Pending') }}
                                    </a>

                                    <form id="approval" action="{{ route('admin.action' , [$user->user_id , 'Rejected']) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <form id="pending" action="{{ route('admin.action', [$user->user_id, 'Pending']) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </td>
                    </tr>
                    @endforeach
                </tbody>         
        </table>
        {{ $approved_users->links('pagination::bootstrap-4') }}
    </div>
        
    </hr>
    <div class="jumbotron">
        <hr/>
            <h4> Rejected Users </h4> 
        </hr>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>UserId</th>
                    <th>name</th>
                    <th>email</th>
                    <th>status</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($rejected_users as $user)           
                    <tr>
                        <td scope="row"> {{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }} </td>
                        <td>
                            <li class="nav-item dropdown"> 
                                {{ $user->status }}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('approval').submit();">
                                        {{ __('Approve') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('pending').submit();">
                                        {{ __('Pending') }}
                                    </a>

                                    <form id="approval" action="{{ route('admin.action' , [$user->user_id , 'Approved']) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <form id="pending" action="{{ route('admin.action', [$user->user_id, 'Pending']) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </td>
                    </tr>
                    @endforeach
                </tbody>         
        </table>
        {{ $rejected_users->links('pagination::bootstrap-4') }}
    </div>

        <hr/>
        <div class="jumbotron">
        <hr/>
            <h4> Pending Users </h4> 
        </hr>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>UserId</th>
                    <th>name</th>
                    <th>email</th>
                    <th>status</th>
                </tr>
            </thead>
                <tbody>
                    @foreach($pending_users as $user)           
                    <tr>
                        <td scope="row"> {{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }} </td>
                        <td>
                            <li class="nav-item dropdown"> 
                                {{ $user->status }}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('approval').submit();">
                                        {{ __('Approve') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('pending').submit();">
                                        {{ __('Reject') }}
                                    </a>

                                    <form id="approval" action="{{ route('admin.action' , [$user->user_id , 'Approved']) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <form id="pending" action="{{ route('admin.action', [$user->user_id, 'Rejected']) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </td>
                    </tr>
                    @endforeach
                </tbody>         
        </table>
        {{ $pending_users->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
