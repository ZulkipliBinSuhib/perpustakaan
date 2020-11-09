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
                    <form action="{{ route('peminjaman.store')}}" method="POST">
                        @csrf

                    <tr>
                        <td><label for="tanggal_pinjam" class="offset-4">Tanggal Pinjam</label> </td>
                        <td><input type="date" class="form-control col-9" name="tanggal_pinjam">
                        
                    </tr>
                    <tr>
                        <td><label for="buku" class="offset-4">Buku</label> </td>
                        <td><select name="buku" id="" class="form-control col-9">
                            <option disabled selected>Pilih Buku</option>
                            @foreach($data_buku as $row)
                            <option value="{{$row->id}}">{{$row->judul_buku}} </option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="peminjam" class="offset-4">Peminjam</label> </td>
                        <td><select name="peminjam" id="" class="form-control col-9">
                            <option disabled selected>Pilih Peminjam</option>
                            @foreach($peminjam as $row)
                            <option value="{{$row->id}}">{{$row->nama}} </option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="petugas" value="{{$petugas}}"></td>
                    </tr>
                    
                   </table>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Input</button>
                    <a href="{{ route('peminjaman.index')}}" class="btn btn-default ">Cancel</a>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>


@endsection
