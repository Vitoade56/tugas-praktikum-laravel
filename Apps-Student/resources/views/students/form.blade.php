@php $s = $student ?? null; @endphp

<div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text" name="nim" value="{{ old('nim', $s->nim ?? '') }}"
           class="form-control @error('nim') is-invalid @enderror">
    @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $s->nama ?? '') }}"
           class="form-control @error('nama') is-invalid @enderror">
    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Jurusan</label>
    <input type="text" name="jurusan" value="{{ old('jurusan', $s->jurusan ?? '') }}"
           class="form-control @error('jurusan') is-invalid @enderror">
    @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Alamat</label>
    <input type="text" name="alamat" value="{{ old('alamat', $s->alamat ?? '') }}"
           class="form-control @error('alamat') is-invalid @enderror">
    @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ url('/students') }}" class="btn btn-secondary">Batal</a>