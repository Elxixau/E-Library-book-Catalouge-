@extends('welcome')

@section('content')

<section>
    <div class="container search-container">
        <div class="row justify-content-center align-items-center ">
            <div class="search-group col-md-8 col-lg-8 ">
                <div class="logo text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="E-Library"> 
                </div>
                <div class="search-box">
                    <form action="{{route('search')}}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari Buku Anda" aria-label="Search" aria-describedby="search-button">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="search-button">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    

@endsection