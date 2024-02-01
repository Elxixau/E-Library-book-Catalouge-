
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="{{ asset('css/session.css') }}">
    <link rel="shortcut icon" href="{{asset('images/spanda.png')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                        <a class="nav-link text-black " href="{{route('logIn')}}">LogIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black " href="{{route('register')}}">Daftar Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black " href="#footer">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')  

    <footer class="footer" id="footer">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <img src="{{asset('images/home.png')}}" alt="logo">
                            </div>
                            <div class="footer-about-content">
                                <p>ELectronic Library SMPN 2 Samarinda<br />
                                Provinsi Kalimantan Timur
                                </p>
                            </div>
                            
                                <div class="card  mb-5">
                                    <div class="card-body">
                                    <h5 class="card-title">Informasi Anda</h5>
                                    <p class="text-muted">IP address : {{$ipAddress}} </p>
                                    <p class="text-muted">User Agent : {{$userAgent}} </p>
                                    </div>
                                </div>
                            
                        </div>
                        <!-- /Footer Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- Footer Widget -->
                        <div class="footer-widget footer-menu mt-3">
                            <h2 class="footer-title">Kontak Kami</h2>
                            <ul>                     
                                <li><a href="..." target="_blank"><i class="far fa-envelope"></i> perpusspanda@gmail.com</a></li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- Footer Widget -->
                        <div class="footer-widget footer-menu mt-3">
                            <h2 class="footer-title">Alamat</h2>
                            <div class="footer-contact-info">
                                <div class="footer-address">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.67508492822!2d117.154!3d-0.496083!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f73bc31f9f9%3A0x47aa6d015b93852!2sSMP%20Negeri%202%20Samarinda!5e0!3m2!1sid!2sid!4v1685683416380!5m2!1sid!2sid"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>

  <script>
      function showPassword() {
    var passwordField = document.getElementById("password");
    var rePasswordField = document.getElementById("re-password");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      rePasswordField.type = "text";
    } else {
      passwordField.type = "password";
      rePasswordField.type = "password";
    }
  }
  </script>           

  @include('includes.script')

</body>
</html>