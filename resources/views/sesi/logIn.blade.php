@extends('session')

@section('content')
<style>
  .row-custom{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
  }
</style>
<div class="log">
  <div class="container-fluid">
    <div class="row row-custom">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{asset('images/KKN-PLP.png')}}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 ">
        @if (session('error'))
          <div class="alert alert-danger mt-4">
              {{ session('error') }}
          </div>
        @endif
        <form   method="POST" action="{{ url('/login/authentication')}}">
          @csrf
          
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-center">
              <p class="lead fw-normal  mt-3">Log <span>In</span></p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
                placeholder="Username" required/>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" name="password" id="password" class="form-control form-control-lg"
                placeholder="Password" data_toggle="password" required/>
              <div class="form-check mt-2 d-flex align-items-center">
                <input class="form-check-input" type="checkbox" onclick="showPassword()">
                <label class="form-check-label text-muted" for="showPassword">Tampilkan Password</label>
                <a href="#" class="ml-auto">Lupa Password</a>
              </div>
            </div>
            
            <div class="text-center text-lg-start mt-4 mb-2 pt-2">
              <button type="submit" class="btn btn-secondary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>

          <p class="justify-content-center align-items-center p-2 mt-4 fs-2">&copy; 2023 KKN-PLP_UNMUL_49_SMPN_2. All rights reserved.</p>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection