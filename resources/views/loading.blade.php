<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <link rel="shortcut icon" href="{{asset('images/spanda.png')}}">
    @include('includes.link')
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('/images/batik.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
                
        .spinner {
            width: 200px; /* Sesuaikan dengan ukuran spinner */
            height: 200px; /* Sesuaikan dengan ukuran spinner */
            position: relative;
        }

        .spinner img.logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px; /* Sesuaikan dengan ukuran logo */
            height: 150px; /* Sesuaikan dengan ukuran logo */
        }

        .spinner::before {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #333;
            border-radius: 100%;
            animation: spin 1s infinite linear;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

    </style>
</head>
<body>
    <div class="spinner1">
        <div class="spinner">
            <img src="{{ asset('images/spanda.png') }}" alt="Logo" class="logo">
        </div>
    </div>
    
    
    
    
    <script>
        setTimeout(function(){
            window.location.href = "{{ route('admin') }}";
        }, 3000); // 3000 milidetik = 3 detik
    </script>
    
</body>
</html>
