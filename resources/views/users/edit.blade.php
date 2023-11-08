{{-- usersedit.blade.php --}}
@extends('layouts.app')

@section('content')
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="container">
        <h2>Uredi korisnika</h2>
        <form method="POST" action="{{ route('users.update', $user->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Ime" >
                <label for="name">Ime</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
                <label for="email">Email</label>
            </div>
            <div class="mb-3">
                <label for="roles" class="form-label">Uloge</label>
                <select multiple class="form-select" name="roles[]" id="roles" aria-label="Uloge">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

                <button type="submit" class="btn btn-primary">Ažuriraj</button>

        </form>
    </div>
@endsection
