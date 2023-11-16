@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card bg-secondary justify-content-center p-3"  >
                <h4 class="ms-0 me-0">Selamat Datang, {{ Auth::user()->name }}</h4>
            </div>
        </div>
    </div>
@if(Auth::user()->role_id == 2)
<h2>Jadwal Latihan</h2>
<table id="listLatihan" class="table table-striped table-bordered pt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>tanggal pelaksanaan</th>
          <th>lokasi</th>
          <th>keterangan</th>
          <th>Aksi</th>
        </tr>      
      </thead>
      <tbody>
        <tr>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td><a href="#">Lihat catatan</a></td>
        </tr>          
      </tbody>
      <tfoot></tfoot>
</table>  
@elseif(Auth::user()->role_id == 3)
<h2>Jadwal Latihan</h2>
<table id="listLatihan" class="table table-striped table-bordered pt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>tanggal pelaksanaan</th>
          <th>lokasi</th>
          <th>keterangan</th>
          <th>Aksi</th>
        </tr>      
      </thead>
      <tbody>
        <tr>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td>lorem ipsum</td>
          <td><a href="#">Lihat catatan</a></td>
        </tr>          
      </tbody>
      <tfoot></tfoot>
</table>    
@else
@endif

@endsection


@section('javascript')
<script>
$(document).ready( function () {
    $('#listLatihan').DataTable();
} );
</script>
@endsection
