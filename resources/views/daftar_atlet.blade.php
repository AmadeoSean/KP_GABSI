@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
@if(Auth::user()->role_id == 2)
{{-- <div class="mb-4 mt-4"> --}}
  <table id="listAtlet" class="table table-striped table-bordered pt-3"  style="width:100%">
    <thead>
      <tr>
        <th >ID</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>Cabang</th>
        <th>Total poin</th>
        <th>Kompetisi yang diikuti</th>
        <th >peringkat</th>
      </tr>
      {{-- <tr>
        <th >Kompetisi yang diikuti</th>
        <th >peringkat</th>
      </tr> --}}
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr >
            <td >{{ $item->id }}</td>
            <td >
                <img src={{ asset('img/765-default-avatar.png') }} alt="" width="100px" height="100px">  
            </td>
            <td >{{ $item->nama }}</td>
            <td >{{ $item->jenis_kelamin }}</td>
            <td >{{ $item->email }}</td>
            <td >{{ $item->gabsi->nama }}</td>
            <td >{{ $item->total_point }}</td>
            
            <td >
              @foreach($item->prestasis as $prestasi)
                <p>{{ $prestasi->kejuaraan->nama }}</p> 
              @endforeach
            </td>
      
            <td >
              @foreach($item->prestasis as $prestasi)
                <p>{{ $prestasi->peringkat }}</p>
              @endforeach
            </td>
          </tr>
      @endforeach
    </tbody>
    <tfoot>
    
    </tfoot>
  </table>
    {{-- <div> {{ $data->withQueryString()->links() }}</div> --}}
{{-- </div> --}}

@elseif(Auth::user()->role_id == 3)
{{-- <div class="card mb-4 mt-4"> --}}
  <table id="listAtlet" class="table table-striped table-bordered pt-3" style="width:100%">
    <thead>
        <tr>
          <th>ID</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Cabang</th>
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
          <td>{{ $item->gabsi->nama }}</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
     
    </tfoot>
  </table>
{{--    
  <div> {{ $data->withQueryString()->links() }}</div> --}}
{{-- </div> --}}
@else

@endif
 
@endsection

@section('javascript')
<script>
$(document).ready( function () {
    $('#listAtlet').DataTable();
} );
</script>
@endsection

