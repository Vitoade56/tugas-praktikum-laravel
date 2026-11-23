@extends('layouts.app')

@section('title', 'Tambah Student')

@section('content')
    <h3 class="mb-3">Tambah Student</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/students') }}" method="POST">
                @csrf
                @include('students._form')
            </form>
        </div>
    </div>
@endsection