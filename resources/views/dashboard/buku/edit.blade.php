@extends('admin')

@section('content')
<div class="container mt-5">
@include('includes.notification')
    <div class="card">

        <div class="card-header">
            <h2>Edit Buku</h2>
        </div>

    <div class="card-body">
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk mengirim perubahan -->

            <div class="form-group">
                <label for="judul">Judul Buku:</label>
                <input type="text" class="form-control border-bottom" id="judul" name="judul" value="{{ $buku->judul }}" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control border-bottom" id="penulis" name="penulis" value="{{ $buku->penulis }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" class="form-control border-bottom" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
            </div>

            <div class="form-group">
                <label for="id_kategori">Kategori</label><br>
                @foreach($kategoriOptions as $kategori)
                    <input type="checkbox" name="id_kategori[]" value="{{ $kategori->id }}" {{ in_array($kategori->id, $buku->id_kategori) ? 'checked' : '' }}>
                    {{ $kategori->kategori }}<br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="pdf_file">PDF File</label>
                <input type="file" class="form-control-file" id="pdf_file" name="pdf_file">
                <small class="form-text text-muted">
                    @if ($buku->pdf_path)
                        PDF URL: {{ $buku->pdf_path }}
                    @else
                        Tidak ada file PDF yang diunggah.
                    @endif
                </small>
            </div>  

            <div class="form-group">
                <label for="gambar_sampul_url">URL Gambar Sampul</label>
                <input type="url" class="form-control" id="gambar_sampul_url" name="gambar_sampul_url" value="{{ $buku->gambar_sampul }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
