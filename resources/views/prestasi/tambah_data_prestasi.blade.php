
@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
<form action="{{ route('prestasi_store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nameCat">Kejuaraan</label>
        <select name="kejuaraan_id" id="kejuaraan" class="form-select">
            @foreach($kejuaraan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>    
        <label for="nameCat">Nomor Spesialis</label>
        <input type="text" class="form-control" id="descCat" name="nomor_spesialis" aria-describedby="nameHelp" placeholder="">

        <label for="nameCat">Peringkat</label>
        <input type="text" class="form-control" id="descCat" name="peringkat" aria-describedby="nameHelp" placeholder="">

        <label for="nameCat">Point</label>
        <input type="text" class="form-control" id="descCat" name="point" aria-describedby="nameHelp" placeholder="">

        <label for="nameCat">keterangan</label>
        <input type="text" class="form-control" id="descCat" name="keterangan" aria-describedby="nameHelp" placeholder="">

       
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection