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
                <h4 class="card-title text-light"> <i class="fas fa-edit text-light mr-2"></i>Form Update Status
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    {{ Form::model($peminjaman,['url'=>'peminjaman/'.$peminjaman->id,'method'=>'put'])}}
                    <form action=""  class="form-horizontal">
                    <tr>
                        <td><label for="tanggal_pinjam" class="offset-4">Tanggal Pinjam</label> </td>
                        <td>{{ Form::date('tanggal_pinjam',null,['placeholder'=>'','class'=>'form-control col-9 ','required','readonly'])}}
                    </tr>
                       {{ Form::hidden('buku',null,['class'=>'form-control col-9','required'])}}
                       {{ Form::hidden('peminjam',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                    <tr>
                        <td><label for="petugas" class="offset-4">Petugas</label> </td>
                        <td>{{ Form::text('petugas',null,['placeholder'=>'','class'=>'form-control col-9 ','required','readonly'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="status" class="offset-4">Status</label> </td>
                        <td>{{ Form::select('status',['0'=>'Dipinjam','1'=>'Dikembalikan'],null,['class'=>'form-control col-9','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" value="{{$date}}" name="tanggal_kembali" id="tanggal_kembali" readonly required></td>
                    </tr>
                        <input type="hidden" name="petugas_b" value="{{$petugas_b}}">   
                  
                </table>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update</button>
                    <a href="{{ route('peminjaman.index')}}" class="btn btn-default ">Cancel</a>
                </div>
                </form>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>

@endsection