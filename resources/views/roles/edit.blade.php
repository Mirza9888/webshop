@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Uredi ulogu</h2>

        {{-- Display all errors in a list if there are any --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.update', $role->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Ime</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $role->name }}" required>
                @error('name')
                <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="permissions" class="form-label">Dozvole</label>
                <select multiple class="form-select" name="permissions[]" id="permissions" size="5" aria-label="permissions">
                    @foreach($permissions as $permission)
                            <?php
                            $selectedPermissions = old('permissions') ?: ($role->permissions ? $role->permissions->pluck('id')->toArray() : []);
                            ?>
                        <option value="{{ $permission->id }}" {{ in_array($permission->id, $selectedPermissions) ? 'selected' : '' }}>{{ $permission->name }}</option>
                    @endforeach
                </select>

                @error('permissions')
                <div class="text-sm text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ažuriraj</button>
        </form>
    </div>
@endsection
