
@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
<form action="{{ route('atlet_store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nameCat">Nama</label>
        <input type="text" class="form-control mb-2" id="descCat" name="nama" aria-describedby="nameHelp" placeholder="">

        <label for="nameCat">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select">
            <option value="Laki-laki">Laki - laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        

        <label for="nameCat">Email</label>
        <input type="text" class="form-control mb-2" id="descCat" name="email" aria-describedby="nameHelp" placeholder="">

        <label for="nameCat">Cabang</label>
         <select name="cabang_id" id="cabang" class="form-select">
            @foreach($cabang as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>    
       
        <label for="nameCat">Total point</label>
        <input type="text" class="form-control mb-2" id="descCat" name="total_point" aria-describedby="nameHelp" placeholder="">

       

       
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection