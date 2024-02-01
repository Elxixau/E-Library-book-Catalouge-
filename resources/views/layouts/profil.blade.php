@extends('welcome')

@section('content')
<style>

  @import url('https://fonts.googleapis.com/css?family=Oswald:300,400,500,700');

  @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');

  *{transition: .5s;}

  .h-100{height: 100vh !important;}
  .align-middle{
    position: relative;
    top:50%;
    transform:translateY(-50%);
  }

  .column{
    margin-top:3rem;
    padding-left:3rem;
    &:hover{
      padding-left:0;
      .card .txt{
        margin-left:1rem;
        h1, p{
          color:rgba(255,255,255,1);
          opacity:1;
        }
      }
      a{
        color:rgb(255, 255, 255);
        &:after{
        width: 10%;
        }
      }
    }
  }
  
  .custom-card{
    min-height:170px;
    background-color: ;
    margin: 0;
    padding: 1.7rem 1.2rem;
    border: none;
    border-radius: 0;
    color:rgba(0,0,0,1);
    letter-spacing: .05rem;
    font-family: 'Oswald', sans-serif;
    box-shadow: 0 0 21px rgba(0,0,0,.27);
    .txt{
      margin-left:-3rem;
      z-index: 1;
      h1{
        font-size:1.5rem;
        font-weight: 300;
        text-transform: uppercase;
      }
      p{
        font-size:.7rem;
        font-family: 'Open Sans', sans-serif;
        letter-spacing: 0rem;
        margin-top:33px;
        opacity:0;
        color:rgb(0, 0, 0);
      }
    }
    a{
      z-index:3;
      font-size: .7rem;
      color:rgba(0,0,0,1);
      margin-left:1rem;
      position:relative;
      bottom: -.5rem;
      text-transform: uppercase;
      &:after {
        content:"";
        display: inline-block;
        height: 0.5em;
        width: 0;
        margin-right: -100%;
        margin-left: 10px;
        border-top: 1px solid rgba(255,255,255,1);
        transition: .5s;
      }
    }
    .ico-card{
      position:absolute;
      top: 0;
      left:0;
      bottom:0;
      right: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }
    i{
      position: relative;
      right: -60%;
      top:55%;
      font-size: 7rem;
      line-height: 0;
      opacity: .4;
      color:rgb(0, 0, 0);
      z-index: 0;
    }
  }
</style>
<div class=" custom-jumbotron">
    <div class="banner">
      <div class="container">
          <h1 class="display-5 col-md-12 " data-aos="fade-down">Selamat <span class="blue">Datang</span> di <span class="blue">E-LIB</span> <br>
          <span class="blue">SMPN 2</span> Samarinda</h1>
          <p class=" col-md-8 fs-4">Tempat Inspirasi dan Pengetahuan! Kami dengan penuh semangat membuka pintu dunia pendidikan untuk Anda. Sebagai lembaga pendidikan terdepan, kami berkomitmen untuk memberikan pengalaman belajar yang tak terlupakan kepada setiap siswa. </p>
      </div>
    </div>
</div>

<section id="icon-boxes" class="icon-boxes mb-0">
  <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 " data-aos="fade-up">
            <div class="icon-box">
                <div class="col-lg-12">
                    <form action="{{route('search')}}" method="GET">
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Cari Buku Anda" aria-label="Search" aria-describedby="search-button">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<section class=" kategori">
  <div class="mb-5" data-aos="fade-up">
    <div class="container-fluid">
      <hr class="mb-5 mt-5">
      <div class=" mb-2 text-container" >
        <h2 class="section-title mb-3">KOLEKSI BUKU</h2>
        <P class="text-muted mb-3" id="title" style=" font-family: 'Kaushan Script';"> Tersimpan di Antara Lembar: Menggali Kekayaan Pengetahuan dalam Koleksi Buku</P>
      </div>
      <div class="row">
        @php
        $modernColors = ['#3498db', '#2ecc71', '#e74c3c', '#f39c12', '#9b59b6', '#1abc9c', '#34495e', '#e67e22'];
        shuffle($modernColors); // Acak urutan warna
        @endphp
        
        @foreach($kategori as $key => $k)
            <div class="col-sm-1 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="column" >
                <div class="card custom-card" style="background-color:  {{ $modernColors[$key % count($modernColors)] }}; background-image: url('/images/batik 1.png'); background-size: cover; outline:none; background-repeat: no-repeat;">
                  <div class="txt" >
                      <h1 class="text-title">{{ $k->kategori }}</h1>
                      <p>Memuat seluruh buku {{ $k->kategori }}.</p>
                  </div>
                  <a href="{{ route('kategori.show', $k->id) }}">Selengkapnya</a>
                  <div class="ico-card">
                    <i class="fa fa-book" aria-hidden="true"></i>
                  </div>
              </div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
  
</section>




@endsection