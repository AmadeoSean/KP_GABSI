@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
@if(Auth::user()->role_id == 2)
  @if(Session::has('status') == 'update_data_berhasil')
  <div class="alert alert-success alert-dismissable fade show d-flex justify-content-between w-50 ms-auto me-auto mb-sm-0 mt-5" role="alert">
      {{ Session::get("message") }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
  </div>
  @endif
  <a class="btn btn-primary mb-3" href="{{ route('atlet_create') }}">Tambah Data</a>
  <table id="listAtlet" class="table table-striped table-bordered display nowrap"  cellspacing="0" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Foto</th>
        {{-- <th>Jenis Kelamin</th> --}}
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
      {{-- {{ dd($data) }} --}}
      @foreach ($data as $item)
          <tr >
            <td >{{ $item->id }}</td>
            <td >{{ $item->nama }}</td>
            <td >
                <img src={{ asset('img/765-default-avatar.png') }} alt="" width="100px" height="100px">  
            </td>
            {{-- <td >{{ $item->jenis_kelamin }}</td> --}}
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
  {{-- <a class="btn btn-primary mb-3" href="{{ route('atlet.create') }}">Tambah Data</a> --}}
  <table id="listAtlet" class="table table-striped table-bordered display nowrap  " cellspacing="0" style="width:100%">
    <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Foto</th>
          <th>Cabang</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td>
              <img src={{ asset('img/765-default-avatar.png') }} alt="" width="100px" height="100px">  
          </td>
          <td>{{ !empty($item->gabsi)?$item->gabsi->nama:'' }}</td>
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
    $('#listAtlet').DataTable({
        scrollX: true,  
        // responsive:true,
        "pagingType": "simple", 

        columnDefs: [
        {
            className: 'dtr-control',
            orderable: false,
            target: 0
        }
        ],
        order: [1, 'asc'],
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        }
        
        // "pagingType": "simple_number"
        
        // dom: '<"toolbar w-25">frtip'
    });

    // $.fn.DataTable.ext.pager.numbers_length = 9;
} );
</script>
@endsection


@section('style')
<style>
    
    @media only screen and (min-width:280px) and (max-width: 408px)  {
        img{
          width:50px;
          height:50px;
        }  
/* 
        div.dataTables_paginate{
          font-size: 4px;
        }
        div.dataTables_length{
          font-size: 8px;
        }
        div.dataTables_filter{
          font-size: 8px;
        } */
      /* div.dataTables_info{
            width: 200px;
        
           
        }
        div.dataTables_paginate{
            width: 200px;
           
            position: relative;
            left: 320px;
            bottom: 40px;
            margin-top: 10px;
        } */
        /* div.dataTables_filter{
            width: 250px;
            
          
        } */
        /* #btnTambahData{
            font-size: 14px; 
            float: left;
        } */
    }
    /* @media only screen and (max-width: 600px) {
        div.dataTables_wrapper {
            width: 850px;
            margin: 0 auto;
        }
    } */
    
</style>
@endsection
