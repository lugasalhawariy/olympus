@extends('layouts.auth')

@section('content')
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Masukan email dan password untuk masuk ke Dashboard!</p>
                </div>
                <div class="card-body">
                  <form role="form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input name="email" type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                    </div>
                    <div class="form-check form-switch">
                      <input name="remember" class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Register</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('{{ asset('argon-dashboard-master/assets/img/carousel-4.jpg')}}');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Perhatikan alur keuangan desa-mu dengan Sikasdesa"</h4>
                <p class="text-white position-relative">Berbagai fitur disediakan agar proses pengelolaan uang desa lebih mudah dalam meningkatkan kualitas Desa.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection