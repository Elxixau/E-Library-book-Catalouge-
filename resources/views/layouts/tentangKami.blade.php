@extends('welcome')

@section('content')
<div class=" custom-jumbotron">
  <div class="banner">
    <div class="container">
        <h1 class="display-5 text-center " data-aos="fade-down">Tentang <span class="blue">Kami</span>  </h1>
    </div>
  </div>
</div>
<section id="tentang-perpustakaan" class="about ">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="row content">
      <div class="col-lg-7">
        <p class="section-title">TENTANG PERPUSTAKAAN</p> <hr>
        <h3 class="fs-2 fw-lighter mb-5 w-70">E-Library SMPN2 adalah Bentuk Modernisasi Media Baca yang Ada Pada Perpustakaan SMPN 2 Samarinda</h3>
        <p class="mt-4 fs-6 opacity-50 w-70">     
          Di E-Library SMPN2, kita tidak hanya menyajikan perpustakaan konvensional. Melainkan, kita membawa literasi ke level berikutnya dengan dunia digital. 
          Dengan koleksi e-book terkini dan sumber daya daring, setiap klik adalah pintu menuju pembelajaran inovatif. Selamat datang di E-Library SMPN2, di mana literasi bertemu teknologi untuk pengalaman belajar yang tak tertandingi.</p>
        <a href="{{route('more')}}"><button class="btn btn-primary btn-animate mt-4" type="button">Selengkapnya</button></a></div>
      <div class="col-lg-4 pt-4 pt-lg-0" data-aos="zoom-in-left" data-aos-duration="1500"><img src="{{asset('images/sally.png')}}" alt="..."  caption="false" /></div>
    </div>
  </div>
</section>
<section id="visi-misi-sekolah" class="vision " >
  <div class="container visi p-5" data-aos="zoom-in-right" data-aos-duration="1500">
      <div class="row mb-4">
        <div class="col-md-12 text-center mb-4">
          <h1 class="display-5">VISI MISI PERPUSTAKAAN</h1>
          <p class="section-title">Melangkah Bersama ke Dunia Ilmu dan Inspirasi</p>
        </div>
      </div>
      <div class="row">
          <div class="col-md-6">
              <h3 class="display-5">Visi</h3>
              <p>
                  Menjadi pusat pembelajaran dan pengetahuan unggul, memancarkan inspirasi bagi siswa untuk menjelajahi dunia melalui kegemaran membaca.
              </p>
          </div>
          <div class="col-md-6">
              <h3 class="display-5">Misi</h3>
              <ul>
                  <li>Menggairahkan minat baca dan literasi di kalangan siswa.</li>
                  <li>Menyediakan koleksi buku berkualitas yang memenuhi kebutuhan siswa.</li>
                  <li>Merayakan kegiatan literasi dan dialog buku yang merangsang pemikiran.</li>
                  <li>Memberikan pelayanan prima untuk setiap pengunjung perpustakaan.</li>
              </ul>
          </div>
      </div>
  </div>
</section>
<section class="gallery">
  <div class="row mb-4">
    <div class="col-md-12 text-center mb-4" > 
      <h1 class="section-title">DOKUMENTASI</h1>
      <p class="text-muted">Berikut dokumentasi aktivitas di perpustakaan</p>
      <hr >
    </div>
  </div>
  <div class="container">
    <div class="lightbox">
      <div class="row">
        <div class="col-lg-6">
          <div class="images">
            <img
              src="{{asset('images/KKN1.jpg')}}"
              data-mdb-img="{{asset('images/KKN1.jpg')}}"
              alt="Table Full of Spices"
              class="w-100 mb-3 mb-md-4 shadow-1-strong rounded"
              data-aos="zoom-in-right" data-aos-duration="1000"
            />
          </div>
          <div class="images">
            <img
              src="{{asset('images/KKN4.jpg')}}"
              data-mdb-img="{{asset('images/KKN4.jpg')}}"
              alt="Coconut with Strawberries"
              class="w-100 mb-3 mb-md-4 shadow-1-strong rounded"
              data-aos="zoom-in-right" data-aos-duration="1000"
            />
          </div>
          <div class="images mb-3">
            <img
              src="{{asset('images/KKN3.jpg')}}"
              data-mdb-img="{{asset('images/KKN3.jpg')}}"
              alt="Table Full of Spices"
              class="w-100  shadow-1-strong rounded"
              data-aos="zoom-in-right" data-aos-duration="1000"
            />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="images">
          <img
            src="{{asset('images/KKN5.jpg')}}"
            data-mdb-img="{{asset('images/KKN5.jpg')}}"
            alt="Dark Roast Iced Coffee"
            class="w-100 mb-3 shadow-1-strong mb-md-4 rounded"
            data-aos="zoom-in-left" data-aos-duration="2000"
          />
          </div>
          <div class="images">
          <img
            src="{{asset('images/KKN2.jpg')}}"
            data-mdb-img="{{asset('images/KKN2.jpg')}}"
            alt="Table Full of Spices"
            class="w-100 mb-3 mb-md-4 shadow-1-strong rounded"
            data-aos="zoom-in-left" data-aos-duration="2000"
          />
          </div>
          <div class="images">
          <img
            src="{{asset('images/KKN6.jpg')}}"
            data-mdb-img="{{asset('images/KKN6.jpg')}}"
            alt="Table Full of Spices"
            class="w-100 h70 mb-3    shadow-1-strong rounded"
            data-aos="zoom-in-left" data-aos-duration="2000"
          />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection