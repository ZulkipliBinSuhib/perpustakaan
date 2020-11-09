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
                        Buku
                    </h3>

                </div>
                <div class="card-body table-responsive">
                    <a href="{{ route('buku.create')}} " type="button" class="btn  float-right mb-1"><i class="fas fa-plus-circle"></i>Tambah Data</a>
                    <table class="table table-bordered table-striped" id="buku">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($buku as $row)
                            <tr class="text-center">
                                <td>{{$no++}} </td>
                                <td>{{ $row->kode_buku}}</td>
                                <td>{{ $row->judul_buku}}</td>
                                <td>{{ $row->penulis_buku}}</td>
                                <td>{{ $row->penerbit_buku}}</td>
                                <td>{{ $row->tahun_buku}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('buku.show',$row->id) }}" data-toggle="modal" data-target="#modalDetail"
                                            class="btn btn-sm btn-info fas fa-eye mr-2" title="Detail"></a>
                                        <a href="{{ route('buku.edit',$row->id) }}"
                                            class="btn btn-sm btn-warning fas fa-edit mr-2" title="Edit"></a>
                                        <form action="{{route('buku.destroy',$row->id)}}" method="post" title="Hapus">
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
<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <table class="table table-borderless">
                @foreach ($buku as $buku)
                    <form action=""  class="form-horizontal">
                    <tr>
                        <td><label for="kode_buku" class="offset-4">Kode Buku</label> </td>
                        <td>: {{ $buku->kode_buku }}
                    </tr>
                    <tr>
                        <td><label for="judul_buku" class="offset-4">Judul Buku</label> </td>
                        <td>: {{ $buku->judul_buku }}
                        </td>
                    </tr><tr>
                        <td><label for="penulis_buku" class="offset-4">Penulis Buku</label> </td>
                        <td>: {{ $buku->penulis_buku }}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="penerbit_buku" class="offset-4">Penerbit Buku</label> </td>
                        <td>: {{ $buku->penerbit_buku }}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tahun_buku" class="offset-4">Tahun Buku</label> </td>
                        <td>: {{ $buku->tahun_buku }}
                        </td>
                    </tr>
                    
                    @endforeach
                
               
                </form>
                </table>
                <!--END FORM TAMBAH BARANG-->
            </div>
        </div>
    </div>
</div>
<!-- End Action -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#buku ').DataTable({});
    });

</script>

@endsection()
