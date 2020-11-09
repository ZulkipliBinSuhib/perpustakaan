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
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline text-sm-3">
                <div class="card-header">
                    <h3 class="card-title text text-bold"> <i class="fas fa-list-alt text-dark mr-2"></i>List
                        Peminjam
                    </h3>
                 
                </div>
                <div class="card-body table-responsive">
                    <a href="{{ route('peminjam.create')}} "><i class="fas fa-plus-circle"></i>Tambah Data</a>
                    <table class="table table-bordered table-striped" id="list_peminjam">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>No_Peminjam</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($peminjam as $row)
                            <tr class="text-center">
                                <td>{{$no++}} </td>
                                <td>{{ $row->no_peminjam}}</td>
                                <td>{{ $row->nama}}</td>
                                <td>{{ $row->alamat}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        
                                        <a href="{{ route('peminjam.edit',$row->id) }}"
                                            class="btn btn-sm btn-warning fas fa-edit mr-2" title="Edit"></a>
                                        <form action="{{route('peminjam.destroy',$row->id)}}" method="post" title="Hapus">
                                            @csrf
                                            @method('Delete')
                                            <button class="btn btn-danger btn-sm fas fa-trash-alt "
                                                onclick="return confirm('Yakin Mau di Hapus ?')" type="submit"></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#buku ').DataTable({
            order: [
                [5, 'desc']
            ],
            rowGroup: {
                dataSrc: 5
            }
        });
        $('#list_peminjam ').DataTable({});
    });

</script>

@endsection()