@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
 
    ini halaman catatan kejuaraan atlet
  
 

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  
@endsection

