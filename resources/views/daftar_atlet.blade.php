@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
@if(Auth::user()->role_id == 2)
<div class="card mb-4 mt-4">
  <table class="table">
    <thead>
      <tr class="text-center">
        <th class="border border border-2 border-dark" rowspan="2">ID</th>
        <th class="border border border-2 border-dark" rowspan="2">Foto</th>
        <th class="border border border-2 border-dark" rowspan="2">Nama</th>
        <th class="border border border-2 border-dark" rowspan="2">Jenis Kelamin</th>
        <th class="border border border-2 border-dark" rowspan="2">Email</th>
        <th class="border border border-2 border-dark" rowspan="2">Cabang</th>
        <th class="border border border-2 border-dark" rowspan="2">Total poin</th>
         
        <th class="border border border-2 border-dark" class="text-center" colspan="2">kejuaraan</th>
      </tr>
      <tr>
        <th class="border border border-2 border-dark">Kompetisi yang diikuti</th>
        <th class="border border border-2 border-dark">peringkat</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr >
            <td class="border border border-2 border-dark">{{ $item->id }}</td>
            <td class="border border border-2 border-dark">
                <img src={{ asset('img/765-default-avatar.png') }} alt="" width="100px" height="100px">  
            </td>
            <td class="border border border-2 border-dark">{{ $item->nama }}</td>
            <td class="border border border-2 border-dark">{{ $item->jenis_kelamin }}</td>
            <td class="border border border-2 border-dark">{{ $item->email }}</td>
            <td class="border border border-2 border-dark">{{ $item->gabsi->nama }}</td>
            <td class="border border border-2 border-dark">{{ $item->total_point }}</td>
            
            <td class="border border border-2 border-dark">
              @foreach($item->prestasis as $prestasi)
                <p>{{ $prestasi->kejuaraan->nama }}</p> 
              @endforeach
            </td>
           
            <td class="border border border-2 border-dark">
              @foreach($item->prestasis as $prestasi)
                <p>{{ $prestasi->peringkat }}</p>
              @endforeach
            </td>
            
          </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination justify-content-center"> {{ $data->withQueryString()->links() }}</div>
</div>

@elseif(Auth::user()->role_id == 3)
<div class="card mb-4 mt-4">
  <table class="table">
    <thead>
      <tr class="text-center">
        <th class="border border border-2 border-dark" rowspan="2">ID</th>
        <th class="border border border-2 border-dark" rowspan="2">Foto</th>
        <th class="border border border-2 border-dark" rowspan="2">Nama</th>
        <th class="border border border-2 border-dark" rowspan="2">Cabang</th>
        {{-- <th class="border border border-2 border-dark" rowspan="2">Total poin</th>
         
        <th class="border border border-2 border-dark" class="text-center" colspan="2">kejuaraan</th>
      </tr>
      <tr>
        <th class="border border border-2 border-dark">Kompetisi yang diikuti</th>
        <th class="border border border-2 border-dark">peringkat</th>
      </tr> --}}
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr >
            <td class="border border border-2 border-dark">{{ $item->id }}</td>
            <td class="border border border-2 border-dark">
                <img src={{ asset('img/765-default-avatar.png') }} alt="" width="100px" height="100px">  
            </td>
            <td class="border border border-2 border-dark">{{ $item->nama }}</td>
            <td class="border border border-2 border-dark">{{ $item->gabsi->nama }}</td>
            {{-- <td class="border border border-2 border-dark">{{ $item->total_point }}</td>
            
            <td class="border border border-2 border-dark">
              @foreach($item->prestasis as $prestasi)
                <p>{{ $prestasi->kejuaraan->nama }}</p> 
              @endforeach
            </td>
           
            <td class="border border border-2 border-dark">
              @foreach($item->prestasis as $prestasi)
                <p>{{ $prestasi->peringkat }}</p>
              @endforeach
            </td> --}}
            
          </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination justify-content-center"> {{ $data->withQueryString()->links() }}</div>
</div>
@else

@endif
{{-- <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content" id="msg">
       <!--loading animated gif can put here-->
     </div>
  </div>
</div> --}}
@endsection

