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
                    {{ Form::model($pengembalian,['url'=>'pengembalian/'.$pengembalian->id,'method'=>'put'])}}
                    <form action=""  class="form-horizontal">
                    <tr>
                        <td><label for="tanggal_kembali" class="offset-4">Tanggal Kembali</label> </td>
                        <td>{{ Form::date('tanggal_kembali',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                    </tr>
                        <td><label for="id_buku" class="offset-4"> Buku</label> </td>
                        <td>{{ Form::text('id_buku',null,['class'=>'form-control col-9','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="peminjam" class="offset-4">Peminjam</label> </td>
                        <td>{{ Form::text('peminjam',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="petugas" class="offset-4">Petugas</label> </td>
                        <td>{{ Form::text('petugas',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                    
                </table>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update</button>
                    <a href="{{ route('pengembalian.index')}}" class="btn btn-default ">Cancel</a>
                </div>
                </form>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>

@endsection