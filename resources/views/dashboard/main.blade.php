@extends('admin')

@section('content')

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">

<style>

h2,
h5,
.h2,
.h5 {
  font-family: inherit;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: .5rem;
  color: #32325d;
}

h2,
.h2 {
  font-size: 1.25rem;
}

h5,
.h5 {
  font-size: .8125rem;
}

.container-fluid {
  width: 100%;
  margin-right: auto;
  margin-left: auto;
  padding-right: 15px;
  padding-left: 15px;
}

.row {
  display: flex;
  margin-right: -15px;
  margin-left: -15px;
  flex-wrap: wrap;
}

.col,
.col-auto,
.col-lg-6,
.col-xl-3,
.col-xl-6 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col {
  max-width: 100%;
  flex-basis: 0;
  flex-grow: 1;
}

.col-auto {
  width: auto;
  max-width: none;
  flex: 0 0 auto;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #fff;
  background-clip: border-box;
}

.card-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card-title {
  margin-bottom: 1.25rem;
}

.card-stats .card-body {
  padding: 1rem 1.5rem;
}

    .icon {
  width: 3rem;
  height: 3rem;
}

.icon i {
  font-size: 2.25rem;
}

.icon-shape {
  display: inline-flex;
  padding: 12px;
  text-align: center;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
}

.icon-shape i {
  font-size: 1.25rem;
}

    .jumbotron-admin {
      background-image: url('/images/gunung.jpg'); /* Ganti dengan path gambar Anda */
        background-size: cover;
        background-position: center;
        background-position: bottom right;
        color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan efek bayangan */        
    }

    .jumbotron h1 {
      color: #fff
        font-size: 2.5rem;
        font-weight: bold; /* Tambahkan font weight */
    }

    .jumbotron p {
        font-size: 1.2rem;
        font-weight: 400; /* Atau sesuaikan dengan font weight yang diinginkan */
    }
</style>

<div class="container">
@include('includes.notification')
<div class="jumbotron jumbotron-admin mt-2">
  <h1 class="text-white">Halo, {{ Auth::user()->name }}</h1>
  <p>Ini adalah halaman kerja anda. Tetap semangat dan semoga hari anda menyenangkan!</p>
  @if($user->username === null || $user->name === null || $user->jabatan === null || $user->email === null)
    <div class="alert alert-warning">
        <strong>Data diri anda belum lengkap</strong>. Harap lengkapi informasi diri anda di halaman profil.
    </div>
@endif

</div>
<div class="card">
  <div class="card-body">
    <div class="main-content">
      <div class="header bg-gradient-primary pb-8 pt-md-8">
        <div class="container-fluid">
          <h2 class="text-black">Info Laman E-Library</h2>
          <hr class="mb-5">
          <div class="header-body">
            <div class="row">
              <div class="col-xl-4 col-lg-4">
                <div class="card card-stats mb-4 mb-xl-0 shadow-sm border-2" >
                  <div class="card-body">
                  <h5 class="card-title text-uppercase text-muted mb-">Jumlah dikunjungi</h5>
                    <div class="row">
                      <div class="col">
                        <span class="h2 font-weight-bold mb-0">{{$monthlyVisitors}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-1 mb-4 text-muted text-sm">
                      <span class="text-nowrap">Bulan ini</span>
                    </p>
                    <div class="row">
                      <div class="col">
                        <span class="h2 font-weight-bold mb-0">{{$yearlyVisitors}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-1 mb-0 text-muted text-sm">
                      <span class="text-nowrap">Tahun ini</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4">
                <div class="card card-stats mb-4 mb-xl-0 shadow-sm border-2">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Buku</h5>
                        <span class="h2 font-weight-bold mb-0">{{$jumlahBuku}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-nowrap">Jumlah buku saat ini</span>
                    </p>
                  </div>
                </div>
              </div>
              @auth
              @if(auth()->user()->role == 'admin')
                <div class="col-xl-4 col-lg-4">
                  <div class="card card-stats mb-4 mb-xl-0 shadow-sm border-2">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Anggota</h5>
                          <span class="h2 font-weight-bold mb-0">{{$jumlahAnggota}}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
                      <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-nowrap">Jumlah anggota saat ini</span>
                      </p>
                    </div>
                  </div>
                </div>
              @endif
            @endauth
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>
</div>
@endsection
