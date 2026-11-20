@extends('layouts.admin')

@section('title', 'Product')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Product</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Laptop</td>
                        <td>Rp 12.500.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Smartphone</td>
                        <td>Rp 6.500.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Keyboard</td>
                        <td>Rp 750.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection