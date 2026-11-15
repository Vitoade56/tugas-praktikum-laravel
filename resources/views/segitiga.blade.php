<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Luas Segitiga</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Hitung Luas Segitiga</h1>

        <form action="/kalkulator/segitiga" method="POST">
            @csrf
            <label>Alas</label>
            <input type="number" name="alas" step="any" required>

            <label>Tinggi</label>
            <input type="number" name="tinggi" step="any" required>

            <button type="submit">Hitung</button>
        </form>

        @if (!is_null($hasil))
            <div class="hasil">
                Luas segitiga = <strong>{{ $hasil }}</strong>
            </div>
        @endif
    </div>
</body>
</html>