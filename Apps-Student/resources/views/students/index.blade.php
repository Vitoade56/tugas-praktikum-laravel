@extends('layouts.app')

@section('title', 'Data Student')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Student</h3>
        <a href="{{ url('/students/create') }}" class="btn btn-primary">Tambah Student</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->nim }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->jurusan }}</td>
                        <td>{{ $s->alamat }}</td>
                        <td>
                            <a href="{{ url('/students/'.$s->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/students/'.$s->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada data student.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection