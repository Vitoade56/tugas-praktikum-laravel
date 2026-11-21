@extends('layouts.admin')

@section('title', 'Tambah Admin')

@section('content')
    <h3>Tambah Admin</h3>
    <form action="/admin" method="POST" class="card card-body">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" value="{{ old('username') }}"
                   class="form-control @error('username') is-invalid @enderror">
            @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div>
            <button class="btn btn-primary">Simpan</button>
            <a href="/admin" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection