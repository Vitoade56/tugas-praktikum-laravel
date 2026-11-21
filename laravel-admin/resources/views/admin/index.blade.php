@extends('layouts.app')

@section('title', 'Data Admin')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Admin</h3>
        <a href="/admin/create" class="btn btn-primary">+ Tambah Admin</a>
    </div>

    <table class="table table-bordered table-striped bg-white">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Dibuat</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $a)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->username }}</td>
                <td>{{ $a->created_at }}</td>
                <td>
                    <a href="/admin/{{ $a->id_admin }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/{{ $a->id_admin }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus admin ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection