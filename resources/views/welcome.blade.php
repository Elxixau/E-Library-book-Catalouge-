<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LIBRARY</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{asset('images/spanda.png')}}">
    @include('includes.link')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/home.png') }}" alt="Instansi Logo" class="mr-2">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-black " href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black " href="{{ route('tentangKami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black " href="#footer">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@yield('content')
    
@include('includes.footer')
   
@include('includes.script') 

<script>
    AOS.init();
</script>

</body>
</html>
