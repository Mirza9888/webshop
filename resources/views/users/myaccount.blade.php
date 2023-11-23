@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- User information display -->
                <div class="user-info">
                    <h4>Ime: {{ Auth::user()->name }}</h4>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Uloge:
                        @foreach(Auth::user()->roles as $role)
                            <span class="badge bg-secondary">{{ $role->name }}</span>
                        @endforeach
                    </p>
                </div>
                <!-- Logout button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
@endsection