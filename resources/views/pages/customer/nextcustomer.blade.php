@extends('layouts.auth')

@section('content')
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('argon-dashboard-master/assets/img/carousel-5.jpg') }}'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Lengkapi Data!</h1>
            <p class="text-lead text-white">Lengkapi data anda dengan .</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-8 col-lg-6 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register Now</h5>
            </div>
            {{-- form input --}}
            <div class="card-body">
              <form method="POST" action="{{ route('nextcustomer.add') }}">
                @csrf
                {{-- data referral_id --}}
                <div class="mb-3">
                    <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                    <input name="referral_id" type="text" class="form-control" placeholder="Kode Referral" aria-label="Kode Referral">
                </div>
                {{-- data address --}}
                <div class="mb-3">
                  <div class="form-floating">
                    <textarea name="address" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Alamat</label>
                  </div>
                </div>
                {{-- data provinsi --}}
                <div class="mb-3" id="province">
                    {{-- TAMPILAN DI PAGES/CUSTOMER/FORM/PROVINCE --}}
                </div>
                {{-- data kabupaten --}}
                <div class="mb-3" id="regency">
                  {{-- TAMPILAN DI PAGES/CUSTOMER/FORM/REGENCY --}}
                </div>
                {{-- data kecamatan --}}
                <div class="mb-3" id="district">
                  {{-- TAMPILAN DI PAGES/CUSTOMER/FORM/DISTRICT --}}
                </div>
                {{-- data desa --}}
                <div class="mb-3" id="village">
                  {{-- TAMPILAN DI PAGES/CUSTOMER/FORM/VILLAGE --}}
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">As Customer</button>
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection

@push('first-script')
<script type="text/javascript">
  $(document).ready(function(){
    getProvince();
  });

  function getProvince(){
    $.get("{{ route('province') }}", {}, function(data, status){
      $('#province').html(data)
    });
  }

  function getRegency(){
    var id = $('#province').find(':selected').attr('data-id')

    $.get("/customer/regency/"+id, {}, function(data, status){
      $('#regency').html(data)
    });
  }

  function getDistrict(){
    var id = $('#regency').find(':selected').attr('data-id')
    
    $.get("/customer/district/"+id, {}, function(data, status){
      $('#district').html(data)
    });
  }

  function getVillage(){
    var id = $('#district').find(':selected').attr('data-id')
    
    $.get("/customer/village/"+id, {}, function(data, status){
      $('#village').html(data)
    });
  }
</script>
@endpush