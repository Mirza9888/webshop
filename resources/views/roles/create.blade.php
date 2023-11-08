@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dodaj ulogu</h2>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ime</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="permissions" class="form-label">Dozvole</label>
                <select multiple class="form-select" name="permissions[]" id="permissions" aria-label="Odabir dozvola">
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}" {{ (collect(old('permissions'))->contains($permission->id)) ? 'selected':'' }}>{{ $permission->name }}</option>
                    @endforeach
                </select>
                @error('permissions')
                <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
