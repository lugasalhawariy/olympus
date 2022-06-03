@extends('layouts.admin')

@section('title')
    Customer
@endsection

@section('content')
    {{-- modal --}}
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select id="user_id" class="form-select" aria-label="Default select example">
                            <option selected>Pilih User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input id="address" type="text" class="form-control" placeholder="Isi data dengan benar">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input id="phone" type="number" class="form-control" placeholder="Isi data berupa nomor">
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input id="kode_pos" type="number" class="form-control" placeholder="Isi data berupa nomor">
                    </div>

                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="store" type="submit" class="btn btn-primary">Save changes</button>
            </div>
            
          </div>
        </div>
      </div>
    {{-- endmodal --}}

    <div class="container-fluid py-4">
        <div class="row px-4">
            <div class="col-4">
                <button id="modal_create" class="btn btn-info btn-small">Tambah Customer</button>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-hover data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <td colspan="6" class="text-center">Data tidak ditemukan</td> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('first-script')
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script>
    $(document).ready(function(){
        getalldata();
    });

    $('#modal_create').click(function(){
        $('.modal').modal('show');
    });

    $('#store').click(function(){
        var user_id = $('#user_id').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var kode_pos = $('#kode_pos').val();
        var token = $('input[name=_token]').val();

        $.ajax({
            url: "{{ route('customer.store') }}",
            type: 'POST',
            data: {
                user_id: user_id,
                address: address,
                phone: phone,
                kode_pos: kode_pos,
                _token: token
            },
            success: function(data){
                $('.modal').modal('hide');
                $('#address').val('');
                $('#phone').val('');
                $('#kode_pos').val('');
                getalldata();
            }
        });
    });

    function getalldata(){
        $('tbody').html('');
        $.ajax({
            url : "{{ route('customer.getAllData') }}",
            type : 'GET',
            dataType : 'json',
            success: function(data){
                $.each(data, function(key, values){
                    id = data[key].id;
                    user_id = data[key].user_id;
                    nama = data[key].user.first_name;
                    alamat = data[key].address;
                    phone = data[key].user.phone;

                    $('tbody').append(
                        '<tr>\
                            <td>'+parseInt(key+1)+'</td>\
                            <td>'+nama+'</td>\
                            <td>'+alamat+'</td>\
                            <td>'+phone+'</td>\
                            <td><a class="btn btn-primary btn-show-modal" href="customer/show/'+id+'" role="button">Show</a></td>\
                            <td><a class="btn btn-warning btn-show-modal" href="customer/edit/'+id+'" role="button">Edit</a></td>\
                        </tr>'
                    );

                    // console.log(data);
                });
            }
        });
    }
</script>
@endpush