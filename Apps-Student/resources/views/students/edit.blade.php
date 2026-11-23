@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <h3 class="mb-3">Edit Student</h3>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/students/'.$student->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('students._form')
            </form>
        </div>
    </div>
@endsection