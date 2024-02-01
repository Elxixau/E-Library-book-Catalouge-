@extends('admin') 

@section('content')
<div class="container scoped-container mt-4">
    @include('includes.notification')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Unggah Buku</div>

                <div class="card-body">
                    
                    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul Buku:</label>
                            <input type="text" class="form-control border-bottom" id="judul" name="judul" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Penulis:</label>
                            <input type="text" class="form-control border-bottom" id="penulis" name="penulis" required>
                        </div>

                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit:</label>
                            <input type="number" class="form-control border-bottom" id="tahun_terbit" name="tahun_terbit" required>
                        </div>

                        <div class="form-group">
                            <label>Pilih Kategori:</label>
                            @foreach($kategoriOptions as $kategoriOption)
                                <div>
                                    <input type="checkbox" name="id_kategori[]" value="{{ $kategoriOption->id }}" id="kategori_{{ $kategoriOption->id }}">
                                    <label for="kategori_{{ $kategoriOption->id }}">{{ $kategoriOption->kategori }}</label>
                                </div>
                            @endforeach
                        </div>                        

                        <div class="form-group">
                            <label for="pdf_file">Unggah Buku PDF:</label>
                            <input type="file" class="form-control-file" id="pdf_file" name="pdf_file" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="gambar_sampul_url">URL Gambar Sampul:</label>
                            <input type="url" name="gambar_sampul_url" class="form-control border-bottom" id="gambar_sampul" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Unggah Buku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
