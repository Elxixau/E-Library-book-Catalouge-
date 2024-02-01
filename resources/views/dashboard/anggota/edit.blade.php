@extends('admin')

@section('content')
<div class="container mt-5">
@include('includes.notification')
    <div class="card">

        <div class="card-header">
            <h2>Edit Anggota</h2>
        </div>

    <div class="card-body">
        <form action="{{ route('buku.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk mengirim perubahan -->

             <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control border-bottom" id="username" name="username" value="{{ $anggota->username }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control border-bottom" id="name" name="name" value="{{ $anggota->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" class="form-control border-bottom" id="jabatan" name="jabatan" value="{{ $anggota->jabatan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control border-bottom" id="email" name="email" value="{{ $anggota->email }}" required>
                    </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
