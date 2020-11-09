@extends('layout')
@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show col-4" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline text-sm-3">
            <div class="card-header bg-info">
                <h4 class="card-title text-light"> <i class="fas fa-edit text-light mr-2"></i>Form Input Buku
                </h4>
            </div>
            <div class="card-body">
               
                <table class="table table-borderless">
                    <form action="{{ route('pengembalian.store')}}" method="POST">
                        @csrf
                    <tr>
                        <td><label for="peminjam" class="offset-4">Pilih Peminjam</label> </td>
                        <td><select name="peminjam" id="peminjam" class="form-control col-9">
                            <option disabled selected>Peminjam</option>
                            @foreach($peminjam as $row)
                            <option value="{{$row->id}}">{{$row->nama}} - {{$row->judul_buku}}  </option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" value="{{$date}}" name="tanggal_kembali" id="tanggal_kembali" readonly required></td>
                        
                    </tr>
                    <tr>
                        <td><label for="buku" class="offset-4">Buku</label> </td>
                        <td><input type="text" class="buku form-control col-9" name="buku" id="buku" readonly  required></td>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><input type="hidden" name="petugas" value="{{$petugas}}"></td>
                    </tr>
                    
                   </table>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Input</button>
                    <a href="{{ route('pengembalian.index')}}" class="btn btn-default ">Cancel</a>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- AJAX Peminjaman -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            console.log($('#peminjam'))
            $('#peminjam').on('input', function () {
                var get = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('pengembalian.ajax_create') }}",
                    dataType: "JSON",
                    data: {
                        get: get
                    },
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        var json = data;
                        var peminjam = json.peminjam;
                        var buku = json.buku;

                        console.log(buku);

                        $('#buku').val(buku);

                    }
                });
                return false;
            });
        });

    </script>

@endsection
