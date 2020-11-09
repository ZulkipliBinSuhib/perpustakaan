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
                    {{ Form::model($peminjam,['url'=>'peminjam/'.$peminjam->id,'method'=>'put'])}}
                    <form action=""  class="form-horizontal">
                   
                    <tr>
                        <td><label for="no_peminjam" class="offset-4">No Peminjam</label> </td>
                        <td>{{ Form::text('no_peminjam',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nama" class="offset-4">Nama</label> </td>
                        <td>{{ Form::text('nama',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alamat" class="offset-4">Alamat</label> </td>
                        <td>{{ Form::text('alamat',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                  
                </table>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update</button>
                    <a href="{{ route('peminjam.index')}}" class="btn btn-default ">Cancel</a>
                </div>
                </form>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>

@endsection