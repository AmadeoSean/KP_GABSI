@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')


@if(Auth::user()->role_id == 2)

<table id="listKejuaraan" class="table table-striped table-bordered" width="100%">
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
    @foreach ($data as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->tanggal_awal }}</td>
          <td>{{ $item->lokasi}}</td>
          <td>{{ $item->keterangan}}</td>
          <td><a href="#">lihat catatan</a></td>
        </tr>
    @endforeach
  </tbody>
</table>

@elseif(Auth::user()->role_id == 3)
<table id="listKejuaraan" class="table table-striped table-bordered" width="100%">
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
    @foreach ($data as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->tanggal_awal }}</td>
          <td>{{ $item->lokasi}}</td>
          <td>{{ $item->keterangan}}</td>
          <td><a href="{{ route("atlet-catatan_kejuaraan") }}">lihat catatan</a></td>
        </tr>
    @endforeach
  </tbody>
</table>

@else
@endif
@endsection

@section('javascript')
<script>
$(document).ready( function () {
    $('#listKejuaraan').DataTable({
        scrollX: true,  
        responsive:true,
        // dom: '<"toolbar w-25">frtip'
    });
} );
</script>
@endsection


