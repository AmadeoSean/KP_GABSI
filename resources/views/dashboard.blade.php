@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
    <div class="row">
        <div class="col-lg-11 col-md-12 col-sm-12 m-4 p-3">
            @if(Auth::user()->role_id == 3)
                <h1>Atlet</h1>
            @elseif(Auth::user()->role_id == 2)
                <h1>pelatih</h1>
            @endif
            <h1></h1>
            <div class="card bg-secondary justify-content-center p-3"  >
                <h4 class="ms-0 me-0">Selamat Datang, {{ Auth::user()->name }}</h4>
            </div>
          
        </div>
         
    </div>
@endsection

