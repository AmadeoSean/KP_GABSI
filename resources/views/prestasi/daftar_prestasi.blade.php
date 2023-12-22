@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
@if(Auth::user()->role_id == 2)
    
@elseif(Auth::user()->role_id == 3)
 
  
  @if(Session::has('status') == 'update_data_berhasil')
  <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between w-50 ms-auto me-auto mb-sm-0 mt-5" role="alert">
      {{ Session::get("message") }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
  </div>
  @endif
  <a class="btn btn-primary mb-3" href="{{ route('prestasi_create') }}">Tambah Data</a>
  <table id="listAtlet" class="table table-striped table-bordered" width="100%">
    <thead>
        <tr>
          <th hidden>Id</th>
          <th>No</th>
          <th>Kejuaraan</th>
          <th>Nomor spesialis</th>
          <th>Peringkat</th>
          <th>Point</th>
          <th>Keterangan</th>
          <th>aksi</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($atlet as $item)
        @foreach ($item->prestasis as $prestasi)
        <tr>
          <td hidden>{{$prestasi->id}}</td>
          <td>{{ $loop->iteration}}</td>
          <td>{{ $prestasi->kejuaraan->nama }}</td>
          <td>{{ $prestasi->nomor_spesialis }}</td>
          <td>{{ $prestasi->peringkat}}</td>
          <td>{{ $prestasi->point}}</td>
          <td>{{ $prestasi->keterangan}}</td>
          <td>
            <a  href="{{ url('/atlet/daftar_prestasi/detail/'.$prestasi->id) }}">update data</a>
            {{-- <a  href="{{ url('/atlet/daftar_prestasi/detail_'.$prestasi->id) }}">update data</a> --}}
          </td>
        </tr>
        @endforeach
      @endforeach
    </tbody>
    <tfoot>
     
    </tfoot>
  </table>

  
  <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-wide">
       <div class="modal-content" id="msg">
         <!--loading animated gif can put here-->
       </div>
    </div>
  </div>
@else

@endif
 
@endsection

@section('javascript')
<script>
$(document).ready( function () {
    let table = $('#listAtlet').DataTable({
        scrollX: true,  
        responsive:true,
        // dom: '<"toolbar w-25">frtip'
    });
    
    // table.on('click', 'tbody tr', function () {
    //   let data = table.row(this).data();
  
    //   alert('You clicked on ' + data[0] + "'s row");
    //   getDetailData(data[0]);
      
    // });
});
 

</script>
 
@endsection

