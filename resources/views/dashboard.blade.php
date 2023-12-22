@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
    <div class="row mt-3 mb-4">
        <div class="col-lg-12 col-md-12 col-sm-6">
            <div class="card bg-secondary justify-content-center p-3"  >
                <h4 class="ms-0 me-0">Selamat Datang, {{Auth::user()->name}}</h4>
            </div>
        </div>
    </div>
@if(Auth::user()->role_id == 2)
  <h2>Jadwal Latihan</h2>
  @if(Session::has('status') == 'update_data_berhasil')
    <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between w-50 ms-auto me-auto mb-sm-0 mt-5" role="alert">
        {{ Session::get("message") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
  @endif

  <a class="btn btn-primary mb-3" href="{{ route('latihan_create') }}">Tambah Data</a>
  <table id="listLatihan" class="table table-striped table-bordered" width="100%">
        <thead>
          <tr>
            <th>Nama Latihan</th>
            <th>Tanggal pelaksanaan</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Aksi</th>
          </tr>      
        </thead>
        <tbody>
          @foreach($data as $item)
          <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->tanggal_latihan }}</td>
            <td>{{ $item->jam_latihan }}</td>
            <td>{{ $item->lokasi }}</td>
          
            <td><a href="{{ url("pelatih/latihan/detail_latihan/".$item->id) }}">Lihat detail</a></td>
          </tr>          
          @endforeach
        </tbody>
        <tfoot></tfoot>
  </table>  
@elseif(Auth::user()->role_id == 3)
  <h2>Jadwal Latihan</h2>
  <table id="listLatihan" class="table table-striped table-bordered" width="100%">
        <thead>
          <tr>
            <th>Nama Latihan</th>
            <th>Tanggal pelaksanaan</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Aksi</th>
          </tr>      
        </thead>
        <tbody>
        
            @foreach($data as $item)
            <tr>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->tanggal_latihan }}</td>
              <td>{{ $item->jam_latihan }}</td>
              <td>{{ $item->lokasi }}</td>
              <td><a href="{{url("atlet/latihan/detail_latihan/".$item->id)}}">Lihat detail</a></td>
            </tr>          
            @endforeach
            
          
        </tbody>
        <tfoot></tfoot>
  </table>    
@else
@endif

@endsection


@section('javascript')
<script>
$(document).ready( function () {
    $('#listLatihan').DataTable({
        scrollX: true,  
        responsive:true,
        // dom: '<"toolbar w-25">frtip'
    });
} );
</script>
@endsection
