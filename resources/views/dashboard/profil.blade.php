@extends('admin')

@section('content')
<style>
    /* public/css/profil.css */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
}

.card {
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.profile-info {
    margin-bottom: 10px; /* Jarak vertikal */
}

.profile-info strong {
    display: inline-block;
    width: 100px; /* Sesuaikan lebar sesuai kebutuhan */
    margin-right: 20px; /* Jarak horizontal */
}

hr {
    border: 0;
    border-top: 1px solid #ddd;
    margin: 10px 0;
}

/* Tambahkan warna latar belakang dan padding pada elemen profil */
.profile-box {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

</style>
<div class="container-fluid mt-4">

    <div class="title-section mb-3 p-2" style="background-color: rgb(139, 150, 166); border-radius:0.25rem;">
        <h5 style="color:rgb(236, 255, 255);">Dashboard / Profil</h5>
    </div>
    @include('includes.notification')

    <div class="card p-52 mt-3">
        <div class="profile-info mb-3">
            <strong>Username</strong> {{ $user->username }}
        </div>
        <hr>
        <div class="profile-info mb-3">
            <strong>Nama</strong> {{ $user->name }}
        </div>
        <hr>
        <div class="profile-info mb-3">
            <strong>Jabatan</strong> {{ $user->jabatan }}
        </div>
        <hr>
        <div class="profile-info mb-3">
            <strong>Email</strong> {{ $user->email }}
        </div>
        <hr>
        <div class="profile-info mb-3">
            <strong>Password</strong> ********* <!-- Tampilkan password sesuai kebijakan keamanan -->
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
            Edit Profil
        </button>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.profil') }}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control border-bottom" id="username" name="username" value="{{ $user->username }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control border-bottom" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Jabatan:</label>
                        <input type="text" class="form-control border-bottom" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control border-bottom" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru:</label>
                        <input type="password" class="form-control" border-bottom id="password" name="password" placeholder="Masukkan password baru">
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Baru:</label>
                        <input type="password" class="form-control border-bottom" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru">
                    </div>

                    <div class="form-group">
                        <label for="showPassword">
                            <input type="checkbox" id="showPassword" onclick="togglePassword()"> Tampilkan Password
                        </label>
                    </div>

                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById('password');
        var passwordConfirmationInput = document.getElementById('password_confirmation');

        if (document.getElementById('showPassword').checked) {
            passwordInput.type = 'text';
            passwordConfirmationInput.type = 'text';
        } else {
            passwordInput.type = 'password';
            passwordConfirmationInput.type = 'password';
        }
    }
</script>
@endsection
