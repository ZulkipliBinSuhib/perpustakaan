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
                    {{ Form::model($buku,['url'=>'buku/'.$buku->id,'method'=>'put'])}}
                    <form action=""  class="form-horizontal">
                    <tr>
                        <td><label for="kode_buku" class="offset-4">Kode Buku</label> </td>
                        <td>{{ Form::text('kode_buku',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                    </tr>
                    <tr>
                        <td><label for="judul_buku" class="offset-4">Judul Buku</label> </td>
                        <td>{{ Form::text('judul_buku',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr><tr>
                        <td><label for="penulis_buku" class="offset-4">Penulis Buku</label> </td>
                        <td>{{ Form::text('penulis_buku',null,['class'=>'form-control col-9','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="penerbit_buku" class="offset-4">Penerbit Buku</label> </td>
                        <td>{{ Form::text('penerbit_buku',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tahun_buku" class="offset-4">Tahun Buku</label> </td>
                        <td>{{ Form::text('tahun_buku',null,['placeholder'=>'','class'=>'form-control col-9 ','required'])}}
                        </td>
                    </tr>
                  
                
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update</button>
                    <a href="{{ route('buku.index')}}" class="btn btn-default ">Cancel</a>
                </div>
                </form>
                </table>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>

@endsection