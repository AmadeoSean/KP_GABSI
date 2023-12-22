<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Catatan</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ url('/atlet/latihan/detail_latihan/'.$jadwal_latihan_id.'/EditCatatanDiri'.'/'.$catatan->id) }}">
        @csrf
        <label for="">nama</label>
        <input type="text" id="namaCat" name="namaCatatan" class="form-control" value="{{ $catatan->nama_catatan }}" disabled>
        <label for="">Catatan Diri</label>
        <textarea id="catatan" name="isiCatatan" class="form-control mb-2" style="min-height: 13rem">{{ $catatan->catatan_diri }}</textarea>

        {{-- <input type="hidden" name="latihan_id" value="{{ $jadwalLatihan->id }}"> --}}
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<div class="modal-footer">
</div>
 