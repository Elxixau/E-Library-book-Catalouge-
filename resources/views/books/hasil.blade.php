@extends('welcome')

@section('content')
<style>
    .card-custom{
  border: none;
  transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
 overflow:hidden;
 border-radius:20px;
 min-width:250px;
 min-height:380px;
   box-shadow: 0 0 12px 0 rgba(0,0,0,0.2);

 @media (max-width: 768px) {
  min-height:350px;
}

@media (max-width: 420px) {
  min-height:300px;
}

 &.card-has-bg{
 transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
  background-size:120%;
  background-repeat:no-repeat;
  background-position: center center;
  &:before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: inherit;
    -webkit-filter: grayscale(1);
  -moz-filter: grayscale(100%);
  -ms-filter: grayscale(100%);
  -o-filter: grayscale(100%);
  filter: grayscale(100%);}

  &:hover {
    transform: scale(0.98);
     box-shadow: 0 0 5px -2px rgba(0,0,0,0.3);
    background-size:130%;
     transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

    .card-img-overlay {
      transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
      background: rgb(255,186,33);
     background: linear-gradient(0deg, rgba(255,186,33,0.5) 0%, rgba(255,186,33,1) 100%);
     }
  }
}
 .card-footer{
  background: none;
   border-top: none;
    .media{
     img{
       border:solid 3px rgba(255,255,255,0.3);
     }
   }
 }
  .card-title{font-weight:800}
 .card-meta{color:rgba(0,0,0,0.3);
  text-transform:uppercase;
   font-weight:500;
   letter-spacing:2px;}
 .card-body{ 
   transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
 

  }
 &:hover {
   .card-body{
     margin-top:30px;
     transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
   }
 cursor: pointer;
 transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
}
 .card-img-overlay {
  transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
 background: rgba(255, 185, 33, 0.385);
background: linear-gradient(0deg, rgba(255,186,33,0.3785889355742297) 0%, rgba(255,186,33,1) 100%);
}
}
</style>
<div class="search">
  <div class="container mt-4">
    <form class="form-inline" action="{{route('search')}}" method="GET">
      <div class="input-group">
        <input type="text" class="form-control border-bottom" id="searchInput" placeholder="Cari buku..." name="search">
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    
    <p class="mt-4">Hasil Pencarian untuk "{{ $searchTerm }}"</p>
    
    <section>
      <div class="row">
        @foreach($books as $book)
          <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <a href="{{ route('book.download', $book->id) }}" >
              <div class="card card-custom text-dark card-has-bg click-col"  style="background-image:url('{{ asset($book->gambar_sampul) }}');">
                <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street">
                <div class="card-img-overlay d-flex flex-column">
                  <div class="card-body">                         
                    <small class="card-meta mb-2">
                      @php
                          $kategoriArray = json_decode($book->id_kategori, true); // Decode JSON string to array
                      @endphp
                  
                      @foreach ($kategoriArray as $kategoriId)
                          @php
                              $kategoriName = \App\Models\KategoriBuku::find($kategoriId);
                          @endphp
                  
                          {{ $kategoriName ? $kategoriName->kategori : 'Nama Kategori Tidak Ditemukan' }}
                          {{-- Use the category name or display a message if category not found --}}
                          @if (!$loop->last), @endif
                          {{-- Add a comma after each category except for the last one --}}
                      @endforeach
                    </small>
                    <h4 class="card-title text-dark ">{{ $book->judul }}</h4>
                    <p> Tahun terbit : {{$book->tahun_terbit}}</p>
                  </div>
                  <div class="card-footer">
                    <div class="media">
                      <div class="media-body">
                        <h6 class="my-0 text-dark d-block">{{$book->penulis}}</h6>                
                        <small><i class="far fa-clock"> {{$book->created_at}}</i> </small>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </section>
    
    
    @if(count($books) === 0)
      <p>Tidak ditemukan buku yang sesuai dengan kata kunci "{{ $searchTerm }}".</p>
    @endif
    
  </div>
</div>
@endsection
