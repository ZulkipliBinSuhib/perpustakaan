@extends('layout')
@section('content')
<div class="col-md-12 col-lg-12 bg-info">
    <div class="text-center text-light ">
      <br>
       <h3>DASHBOARD</h3>
       <br>
    </div>
</div>
<div class="col-md-12 col-lg-12 bg-info">
    <div class="card-service text-center text-lg-left mb-4 ">
       
        <h5 class="card-service__subtitle">Aplikasi Manajemen Buku Berbasis Web ini Berfungsi Untuk Menyimpan Data Buku dan Mengelola Transaksi Peminjaman Buku di Perpustakaan Galuh </h5>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-info card-outline text-sm-3">
                <div class="card-header">
                    <h3 class="card-title text text-bold"> <i class="fas fa-list-alt text-dark mr-2"></i>Daftar Dipinjam
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped" id="list_peminjaman">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Buku</th>
                                <th>Peminjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;    
                            ?>
                            @foreach ($get_data as $row)
                            <tr class="text-center">
                                <td>{{$no++}} </td>
                                <td>{{ $row->tanggal_pinjam}}</td>
                                <td>{{ $row->judul_buku}}</td>
                                <td>{{ $row->nama}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        $('#list_peminjaman ').DataTable({});
    });

</script>
 



@endsection
