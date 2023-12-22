{{-- @extends( Auth::user()->role_id == 3 ? 'latihan.catatan_latihan' : (Auth::user()->role_id == 2 ? 'latihan.catatan_latihan' : 'latihan.catatan_latihan') )
@section('notes')
 
    

@endsection --}}
@if(Auth::user()->role_id == 2)
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">update Catatan</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body"> 
    <form action="{{url('/pelatih/latihan/detail_latihan/'.$jadwal_latihan_id.'/EditCatatanPelatih'.'/'.$catatan->id) }}" method="POST">
        @csrf
        <label for="">nama</label>
        <input type="text" id="namaCat" name="namaCatatan" class="form-control" value="{{ $catatan->nama_catatan  }}">
        <label for="">Pasangan</label>
        <select name="pasangan" id="pasangans" class="form-select" disabled>
            <option value="{{ $catatan->pasangan->atlet_1}} - {{ $catatan->pasangan->atlet_2}}">{{ $catatan->pasangan->atlet_1->nama.' - '.$catatan->pasangan->atlet_2->nama}}</option>
        </select>
        
        <label for="catatan">Isi Catatan</label>
        <textarea id="catatan" name="isiCatatan" class="form-control mb-2">
        {{ $catatan->catatan_pelatih }}
        </textarea>
        {{-- <input type="hidden" name="latihan_id" value="{{ $latihan->id }}"> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="modal-footer">
</div>
{{-- @elseif(Auth::user()->role_id == 2)
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">update Catatan</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body"> 
    <form action="{{url('/pelatih/latihan/detail_latihan/'.$latihan_id.'/EditCatatan'.'/'.$catatan->id) }}" method="POST">
        @csrf
        <label for="">nama</label>
        <input type="text" id="namaCat" name="namaCatatan" class="form-control" value="{{ $catatan->nama_catatan  }}">
        <label for="">Pasangan</label>
        <select name="pasangan" id="pasangans" class="form-select" disabled>
            <option value="{{ $catatan->pasangan->atlet_1}} - {{ $catatan->pasangan->atlet_2}}">{{ $catatan->pasangan->atlet_1->nama.' - '.$catatan->pasangan->atlet_2->nama}}</option>
        </select>
        
        <label for="catatan">Isi Catatan</label>
        <textarea id="catatan" name="isiCatatan" class="form-control mb-2">
        {{ $catatan->catatan_pelatih }}
        </textarea>
        <input type="hidden" name="latihan_id" value="{{ $latihan->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="modal-footer">
</div> --}}
@endif