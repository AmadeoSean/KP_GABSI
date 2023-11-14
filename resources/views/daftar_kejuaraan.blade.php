@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
<div class="page-content">
    ini halaman daftar kejuaraan
  
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>tanggal pelaksanaan</th>
        <th>lokasi</th>
        <th>keterangan</th>
        <th></th>
        <th></th>
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
           
          </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content" id="msg">
       <!--loading animated gif can put here-->
     </div>
  </div>
</div>
@endsection

