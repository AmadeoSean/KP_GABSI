
@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
{{-- <form action="{{ url('/atlet/daftar_prestasi/detail_'.$prestasi->id) }}" method="POST"> --}}
<form action="{{ url('/atlet/daftar_prestasi/detail/'.$prestasi->id) }}" method="POST">
    @csrf
    {{-- @method("PUT") --}}
    <div class="form-group">
        <label class="labels">Kejuaraan</label>
            <select name="kejuaraan_id" id="kejuaraan" class="form-select">
                @foreach($kejuaraan as $item2)
                    @if($prestasi->kejuaraan->nama == $item2->nama)
                        <option value="{{ $item2->id }}" selected>{{ $item2->nama }}</option>
                    @else
                        <option value="{{ $item2->id }}">{{ $item2->nama }}</option>
                    @endif
                @endforeach
            </select>           
        <label class="labels">Nomor Spesialis</label><input type="text" class="form-control" placeholder="" name="nomor_spesialis" value="{{ $prestasi->nomor_spesialis }}">
        <label class="labels">Peringkat</label><input type="text" class="form-control" placeholder="" name="peringkat" value="{{ $prestasi->peringkat }}">
        <label class="labels">Point</label><input type="text" class="form-control" placeholder="" name="point" value="{{ $prestasi->point }}">
        <label class="labels">Keterangan</label><input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $prestasi->keterangan }}">
    </div>
    {{-- <div class="container rounded bg-white mt-1 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-3 ">
                        <label class="labels">Kejuaraan</label>
                        <select name="kejuaraan_id" id="kejuaraan" class="form-control">
                            @foreach($kejuaraan as $item2)
                                @if($prestasi->kejuaraan->nama == $item2->nama)
                                    <option value="{{ $item2->id }}" selected>{{ $item2->nama }}</option>
                                @else
                                    <option value="{{ $item2->id }}">{{ $item2->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3 "><label class="labels">Nomor Spesialis</label><input type="text" class="form-control" placeholder="" name="nomor_spesialis" value="{{ $prestasi->nomor_spesialis }}"></div>
                    <div class="col-md-12 mb-3 "><label class="labels">Peringkat</label><input type="text" class="form-control" placeholder="" name="peringkat" value="{{ $prestasi->peringkat }}"></div>
                    <div class="col-md-12 mb-3 "><label class="labels">Point</label><input type="text" class="form-control" placeholder="" name="point" value="{{ $prestasi->point }}"></div>
                    <div class="col-md-12 mb-3 "><label class="labels">Keterangan</label><input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $prestasi->keterangan }}"></div>
                </div> 
        </div> --}}
        <div class="text-center mb-5 mt-3  "><button class="btn btn-primary profile-button w-100" type="submit">Save Update</button></div>
</form>
@endsection