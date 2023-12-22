
@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )

@section('konten')
<form action="{{ route('latihan_store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="namaLat">Nama Latihan</label>
        <input type="text" class="form-control mb-2" id="namaLat" name="title" aria-describedby="nameHelp" placeholder="" required>

        <label for="tglLat">tanggal latihan</label>
        <input type="date" class="form-control mb-2" id="tglLat" name="date" aria-describedby="nameHelp" placeholder="" required>

        <label for="jamLat">Jam latihan</label>
        <input type="time" class="form-control mb-2" id="jamLat" name="time" aria-describedby="nameHelp" placeholder="" required>

        <label for="lokasiLat">Lokasi</label>
        <input type="text" class="form-control mb-2" id="lokasiLat" name="location" aria-describedby="nameHelp" placeholder="" required>

        
        <label for="nameCat" >Pasangan atlet</label> <a class="btn btn-primary mb-1" id="tambahPasangan" onclick="tambahPasangan()">Tambah</a>
        <div class="border d-flex flex-wrap justify-content-center mb-4 mt-4 " id="pasangan-group">
            <input type="hidden" value="0" name="jml_pasangan" id="jml_pasangan">
            
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    let x = 0;
    const arr = [];
    localStorage.clear();
    function tambahPasangan()
    {
        // alert(arr);
        x += 1; 
        let arr_length = arr.length - 1
        $("#pasangan-group").append(
            '<div class=" m-3 p-3 border" id="pasangan_'+x+'">'+
                '<input type="hidden" value="'+x+'" id="pasangan_ke_'+x+'">'+
                '<label for="" class="mb-2" id="title_'+x+'">Pasangan '+x+'</label><br>'+
                '<label for="" class="mb-2">Atlet 1</label>'+
                '<select name="atlet_1_pasangan_'+x+'" id="atlet_1_'+x+'" class="form-select mb-2   d-flex flex-wrap">'+
                    ' @foreach($atlet as $item)'+
                        ' <option value="{{ $item->id }}">{{ $item->nama }}</option>'+
                    '@endforeach'+
                ' </select> ' +
                '<label for="" class="mb-2">Atlet 2</label>'+
                '<select name="atlet_2_pasangan_'+x+'" id="atlet_2_'+x+'" class="form-select mb-2  ">'+
                    '@foreach($atlet as $item)'+
                        '<option value="{{ $item->id }}">{{ $item->nama }}</option>'+
                    '@endforeach'+
                '</select>'+ 
                '<a class="btn btn-primary mb-1 w-100" id="hapusPasangan_'+x+'" onclick="hapusPasangan('+x+')">Hapus</a>'+
                '<a class="btn btn-primary mb-1 w-100" id="salinPasangan_'+x+'" onclick="salinPasangan('+x+')">Salin</a>'+
            '</div>');
        $('#jml_pasangan').val(x);
        arr.push(x);
    }

    function hapusPasangan(val)
    {
        $('#pasangan_'+val).remove();

        // localStorage.removeItem('pasangan_iterasi_'+val);
        localStorage.clear();
        x -= 1;
        $('#jml_pasangan').val(x);

        const index = arr.indexOf(val); // get index of the item
    
        if (index !== -1) { // only splice array when item is found
            arr.splice(index, 1);
        }
        // alert(arr);
        for (let i of arr) { //1,3,4
            let j = arr.indexOf(i)+1
            if (i != j){
                arr[j-1] = j;
                
                $('#pasangan_'+i).attr('id', 'pasangan_'+arr[j-1]);
                $('#pasangan_ke_'+i).val(arr[j-1]);
                $('#pasangan_ke_'+i).attr('id', 'pasangan_ke_'+arr[j-1]);
                $('#title_'+i).html('Pasangan '+arr[j-1]);
                $('#title_'+i).attr('id','title_'+arr[j-1]);

                $('#atlet_1_'+i).attr('name','atlet_1_pasangan_'+arr[j-1]);
                $('#atlet_1_'+i).attr('id','atlet_1_'+arr[j-1]);
                
                $('#atlet_2_'+i).attr('name','atlet_2_pasangan_'+arr[j-1]);
                $('#atlet_2_'+i).attr('id','atlet_2_'+arr[j-1]);

                $('#hapusPasangan_'+i).attr('onclick', 'hapusPasangan('+arr[j-1]+')');
                $('#hapusPasangan_'+i).attr('id','hapusPasangan_'+arr[j-1]);

                $('#salinPasangan_'+i).attr('onclick', 'salinPasangan('+arr[j-1]+')');
                $('#salinPasangan_'+i).attr('id','salinPasangan_'+arr[j-1]);
            }
            
        }
        // alert(arr);
        for(let j of arr){
            localStorage.setItem('pasangan_iterasi_'+j, j);
        }
    
    }  
    let jml_salinan = 1;
    function salinPasangan(val)
    {
        $('#jml_pasangan').val(x);
        let id_atlet_1 = $('#atlet_1_'+val).val();
        let id_atlet_2 = $('#atlet_2_'+val).val();

        
        localStorage.setItem('salinan_atlet_1_pasangan_'+val, id_atlet_1);
        localStorage.setItem('salinan_atlet_2_pasangan_'+val, id_atlet_2);
        
        const indexToCopy = arr.indexOf(val);
        const elementToCopy = arr[indexToCopy];

        
        arr.splice(indexToCopy + 1, 0, elementToCopy);
       
        const index = arr.indexOf(val); // get index of the item
        
        let j = 1;
        let idx = arr.length - 1; // -> 4
        let atlet_1 =  localStorage.getItem('salinan_atlet_1_pasangan_'+val);
        let atlet_2 =  localStorage.getItem('salinan_atlet_2_pasangan_'+val);
        
 
        for (let i of arr) { 
            let k = arr[arr.indexOf(i)+1];
                if(i==k && k != null){
                    // alert('item = ' + i );
                    // alert(arr);
                    if(i == val && k == val){
                        
                        $("#pasangan_"+i).after(
                        '<div class=" m-3 p-3 border" id="pasangan_'+(i+1)+'_salinan">'+
                            '<input type="hidden" value="'+(i+1)+'" id="pasangan_ke_'+(i+1)+'_salinan">'+
                            '<label for="" class="mb-2" id="title_'+(i+1)+'_salinan">Pasangan '+(i+1)+'</label><br>'+
                            '<label for="" class="mb-2">Atlet 1</label>'+
                            '<select name="atlet_1_pasangan_'+(i+1)+'" id="atlet_1_'+(i+1)+'_salinan" class="form-select mb-2   d-flex flex-wrap">'+
                                ' @foreach($atlet as $item)'+
                                    ' <option value="{{ $item->id }}">{{ $item->nama }}</option>'+
                                '@endforeach'+
                            ' </select> ' +
                            '<label for="" class="mb-2">Atlet 2</label>'+
                            '<select name="atlet_2_pasangan_'+(i+1)+'" id="atlet_2_'+(i+1)+'_salinan" class="form-select mb-2  ">'+
                                '@foreach($atlet as $item)'+
                                    '<option value="{{ $item->id }}">{{ $item->nama }}</option>'+
                                '@endforeach'+
                            '</select>'+ 
                            '<a class="btn btn-primary mb-1 w-100" id="hapusPasangan_'+(i+1)+'_salinan" onclick="hapusPasangan('+(i+1)+')">Hapus</a>'+
                            '<a class="btn btn-primary mb-1 w-100" id="salinPasangan_'+(i+1)+'_salinan" onclick="salinPasangan('+(i+1)+')">Salin</a>'+
                        '</div>');

                        $('#atlet_1_'+(i+1)+'_salinan').val(atlet_1);
                        $('#atlet_2_'+(i+1)+'_salinan').val(atlet_2);
                        x += 1;
                        $('#jml_pasangan').val(x);
                        arr[arr.indexOf(i)+1] += 1
                        //alert(arr);// 1,2,2,3,4,5 -> 1,2,3,3,4,5 -> 1,2,3,4,4,5 -> 1,2,3,4,5,5
                        // 1,2,3,4 -> 1,2,2,3,4 -> 1,2,3,3,4 -> 1,2,3,4,4 -> 1,2,3,4,5 
                        // 1,2 -> 1,2,2 -> 1,2,3
                    }else{
                        $('#pasangan_'+i).attr('id', 'pasangan_'+(i+1)+'_salinan');
                        $('#pasangan_ke_'+i).attr('id', 'pasangan_ke_'+(i+1)+'_salinan'); 
                        $('#title_'+i).attr('id','title_'+(i+1)+'_salinan');
                        $('#atlet_1_'+i).attr('id','atlet_1_'+(i+1)+'_salinan');
                        $('#atlet_2_'+i).attr('id','atlet_2_'+(i+1)+'_salinan');
                        $('#hapusPasangan_'+i).attr('id','hapusPasangan_'+(i+1)+'_salinan');
                        $('#salinPasangan_'+i).attr('id','salinPasangan_'+(i+1)+'_salinan');

                        $('#pasangan_ke_'+(i+1)+'_salinan').val((i+1));
                        $('#title_'+(i+1)+'_salinan').html('Pasangan '+(i+1));
                        $('#atlet_1_'+(i+1)+'_salinan').attr('name','atlet_1_pasangan_'+(i+1));
                        $('#atlet_2_'+(i+1)+'_salinan').attr('name','atlet_2_pasangan_'+(i+1));
                        $('#hapusPasangan_'+(i+1)+'_salinan').attr('onclick', 'hapusPasangan('+(i+1)+')');
                        $('#salinPasangan_'+(i+1)+'_salinan').attr('onclick', 'salinPasangan('+(i+1)+')');
                        
                        

                        $('#pasangan_'+i+'_salinan').attr('id', 'pasangan_'+i);
                        $('#pasangan_ke_'+i+'_salinan').attr('id', 'pasangan_ke_'+i);
                        $('#title_'+i+'_salinan').attr('id','title_'+i);
                        $('#atlet_1_'+i+'_salinan').attr('id','atlet_1_'+i);
                        $('#atlet_2_'+i+'_salinan').attr('id','atlet_2_'+i);
                        $('#hapusPasangan_'+i+'_salinan').attr('id','hapusPasangan_'+i);
                        $('#salinPasangan_'+i+'_salinan').attr('id','salinPasangan_'+i);

                        $('#pasangan_ke_'+i).val(i);
                        $('#title_'+i).html('Pasangan '+i);
                        $('#atlet_1_'+i).attr('name','atlet_1_pasangan_'+i);
                        $('#atlet_2_'+i).attr('name','atlet_2_pasangan_'+i);
                        $('#hapusPasangan_'+i).attr('onclick', 'hapusPasangan('+i+')');
                        $('#salinPasangan_'+i).attr('onclick', 'salinPasangan('+i+')');
                        
                        arr[arr.indexOf(i)+1] += 1
                    }
                    
                        
                        // alert(arr);
                    

                }else if (k == null){
                        $('#pasangan_'+i+'_salinan').attr('id', 'pasangan_'+i);
                        $('#pasangan_ke_'+i+'_salinan').attr('id', 'pasangan_ke_'+i);
                        $('#title_'+i+'_salinan').attr('id','title_'+i);
                        $('#atlet_1_'+i+'_salinan').attr('id','atlet_1_'+i);
                        $('#atlet_2_'+i+'_salinan').attr('id','atlet_2_'+i);
                        $('#hapusPasangan_'+i+'_salinan').attr('id','hapusPasangan_'+i);
                        $('#salinPasangan_'+i+'_salinan').attr('id','salinPasangan_'+i);

                        $('#pasangan_ke_'+i).val(i);
                        $('#title_'+i).html('Pasangan '+i);
                        $('#atlet_1_'+i).attr('name','atlet_1_pasangan_'+i);
                        $('#atlet_2_'+i).attr('name','atlet_2_pasangan_'+i);
                        $('#hapusPasangan_'+i).attr('onclick', 'hapusPasangan('+i+')');
                        $('#salinPasangan_'+i).attr('onclick', 'salinPasangan('+i+')');
                }
             
        }
        localStorage.clear();
        // alert(arr);
    }  
</script>
@endsection