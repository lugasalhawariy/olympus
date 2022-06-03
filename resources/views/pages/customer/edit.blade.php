@extends('layouts.admin')

@section('title')
    Ubah Data Customer
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row px-4">
        <div class="col-12 text-center">
            <h2 class="text-white">Ubah Data Customer {{ $data->user->first_name }}</h2>
        </div>
    </div>
    <div class="row p-4">
        <div class="col-12">
            {{-- start:validasi input alert --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- end:validasi input alert --}}
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <form action="{{ route('customer.update') }}" method="post">
                        @csrf
                        <input id="id_data" value="{{ $data->id }}" type="hidden" class="form-control">
                        <input id="user_id" value="{{ $data->user_id }}" type="hidden" class="form-control">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Nama Depan</label>
                            <input id="first_name" value="{{ old($data->user->first_name) ?? $data->user->first_name }}" type="text" class="form-control" placeholder="Isi data dengan benar">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input id="address" value="{{ old($data->address) ?? $data->address }}" type="text" class="form-control" placeholder="Isi data dengan benar">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input id="phone" value="{{ old($data->user->phone) ?? $data->user->phone }}" type="number" class="form-control" placeholder="Isi data berupa nomor">
                        </div>
                        <div class="mb-3">
                            <button id="update" type="submit" class="w-100 btn btn-warning">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('first-script')
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script>

    function toCustomer(){
        let url = "/customer";
        document.location.href = url;
    }

    $('#update').click(function(){
        var id = $('#id_data').val();
        var user_id = $('#user_id').val();
        var first_name = $('#first_name').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var token = $('input[name=_token]').val();

        $.ajax({
            url: "{{ route('customer.update') }}",
            type: 'POST',
            data: {
                id: id,
                user_id: user_id,
                first_name: first_name,
                address: address,
                phone: phone,
                _token: token
            },
            success: function(response) {
                window.location.href = "customer";
            }
        });
    });
</script>
@endpush