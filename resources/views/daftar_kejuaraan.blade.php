@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
<div class="page-content">
    ini halaman daftar kejuaraan
  {{-- <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pembeli</th>
        <th>Kasir</th>
        <th>Tanggal Transaction</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->buyer->name }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->created_at }}</td>
            <td><a class="btn btn-default" href="#basic" data-toggle="modal" 
                onclick="getDetailData({{ $item->id }})">Lihat rincian pembelian </a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table> --}}
</div>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content" id="msg">
       <!--loading animated gif can put here-->
     </div>
  </div>
</div>
@endsection

