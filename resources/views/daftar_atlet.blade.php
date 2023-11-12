@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
<div class="card mb-4 mt-4">
  <table class="table">
    <thead>
      <tr class="text-center">
        <th rowspan="2">ID</th>
        <th rowspan="2">Foto</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Jenis Kelamin</th>
        <th rowspan="2">Email</th>
        <th rowspan="2">Gabsi</th>
        <th rowspan="2">Total poin</th>
        <th class="text-center" colspan="2">kejuaraan</th>
      </tr>
      <tr>
        <th>Kompetisi yang diikuti</th>
        <th>peringkat</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>
                <img src={{ asset('img/765-default-avatar.png') }} alt="" width="100px" height="100px">  
            </td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->gabsi->nama }}</td>
            <td>{{ $item->total_point }}</td>
            @foreach($item->prestasis as $prestasi)
            <td>{{ $prestasi->kejuaraan->nama }}</td>
            <td>{{ $prestasi->peringkat }}</td>
            @endforeach
          </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination justify-content-center"> {{ $data->withQueryString()->links() }}</div>
</div>

 
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content" id="msg">
       <!--loading animated gif can put here-->
     </div>
  </div>
</div>
@endsection

