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
                        Peminjaman
                    </h3>
                </div>
               
                <div class="card-body table-responsive">
                <form action="" autocomplete="off" class="form-inline input-daterange">
                       
                    <div class="form-group mb-2">
                        FROM -
                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" >
                    </div>
                    
                    <div class="form-group mx-sm-2 mb-2">
                       - TO -
                        <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" >
                    </div>
                    <div class="form-group mx-sm-1 mb-2">
                        <div>
                        </div>
                        <button type="submit" name="" id="" class="btn btn-info ml-1"> Filter</a>
                    </div>
                </form>
                    <a href="{{ route('peminjaman.create')}} "><i class="fas fa-plus-circle"></i>Tambah Data</a>
                    <table class="table table-bordered table-striped" id="list_peminjaman">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Buku</th>
                                <th>Peminjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Petugas</th>
                                <th>Tanggal Kembali</th>
                                <th>Petugas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($peminjaman as $row)
                            <tr class="text-center">
                                <td>{{$no++}} </td>
                                <td>{{ $row->judul_buku}}</td>
                                <td>{{ $row->nama}}</td>
                                <td>{{ $row->tanggal_pinjam}}</td>
                                <td>{{ $row->petugas}}</td>
                                <td>{{ $row->tanggal_kembali}}</td>
                                <td>{{ $row->petugas_b}}</td>
                                <td>{!! $row->status ? '<span class=" " >Dikembalikan</span>' : '<span class="">Dipinjam</span>'!!}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('peminjaman.show',$row->id) }}" data-toggle="modal" data-target="#modalDetail"
                                            class="btn btn-sm btn-info fas fa-eye mr-2" title="Detail"></a>
                                        @if(!$row->status)
                                        <a href="{{ route('peminjaman.edit',$row->id) }}"
                                            class="btn btn-sm btn-warning fas fa-edit mr-2" title="Ubah Status"></a>
                                        @endif
                                        <form action="{{route('peminjaman.destroy',$row->id)}}" method="post" title="Hapus">
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
                <table class="table table-borderless">
                @foreach ($peminjaman_detail as $peminjaman)
                    <form action=""  class="form-horizontal">
                    <tr>
                        <td><label for="tanggal_pinjam" class="offset-4">Tanggal Pinjam</label> </td>
                        <td>: {{ $peminjaman->tanggal_pinjam }}
                    </tr>
                    <tr>
                        <td><label for="id_buku" class="offset-4">Buku</label> </td>
                        <td>: {{ $peminjaman->judul_buku }}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="peminjam" class="offset-4">Peminjam</label> </td>
                        <td>: {{ $peminjaman->peminjam }}
                        </td>
                    </tr>
                    <tr>
                        <td><label for="petugas" class="offset-4">Petugas</label> </td>
                        <td>: {{ $peminjaman->petugas }}
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
        $('#buku ').DataTable({
            order: [
                [5, 'desc']
            ],
            rowGroup: {
                dataSrc: 5
            }
        });
        $('#list_peminjaman ').DataTable({});
    });

</script>

@endsection()