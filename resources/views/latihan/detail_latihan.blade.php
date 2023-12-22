@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )



@section('konten')
@if(Auth::user()->role_id == 2)
    <a class="btn btn-primary" id="tambahCatatan" data-bs-toggle="modal" data-bs-target="#tambahCatatanModal" href="#">Tambah Catatan</a>
        
        
    <div class="card rounded-3 mt-3">
        <div class="card-body">
            <div class="h6 font-weight-bold">{{ $jadwalLatihan->id }} / {{ $jadwalLatihan->nama }}</div>
            <div class="text-primary">Tanggal Pelaksanaan : {{ $jadwalLatihan->tanggal_latihan}}</div>  
            <div class="text-primary">Jam Latihan : {{ $jadwalLatihan->jam_latihan }}</div>
            <div class="text-primary">Lokasi : {{ $jadwalLatihan->lokasi }}</div>
            <div class="text-primary">Pelatih : {{ $jadwalLatihan->pelatih->nama }}</div>
        </div>
    </div>
    <nav class="mt-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Catatan Pelatih</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane slide-in-right show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div id="accordion" class="border rounded ">
                @foreach($latihan->catatanPelatih AS $item) 
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button class="btn btn-link link-underline link-underline-opacity-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $item->id }}" aria-expanded="false" aria-controls="collapseOne">
                            {{ $item->id }} - {{ $item->nama_catatan }}
                        </button>
                        </h5>
                    </div>

                    <div id="collapse-{{ $item->id }}" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="card-body">
                            {{ $item->catatan_pelatih }}
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#updateCatatanModal"  onclick="getDetailCatatanPelatih({{$item->id}}, {{ $latihan->jadwal_latihan_id }})">update</button>
                            <button class="btn btn-primary m-2" >remove</button>
                        </div>
                    </div>
                </div>      
                @endforeach
            </div>
        </div>
         
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahCatatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Catatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/pelatih/latihan/detail_latihan/'.$jadwalLatihan->id.'/tambahCatatanPelatih') }}">
                    @csrf
                    <label for="">nama</label>
                    <input type="text" id="namaCat" name="namaCatatan" class="form-control">
                    <label for="">Pasangan</label>
                    <select name="pasangan" id="pasangans" class="form-select">
                        @foreach($pasangans as $item)
                        <option value="{{ $item->id}}">{{ $item->atlet_1->nama.' - '.$item->atlet_2->nama}}</option>
                        @endforeach
                    </select>
                    <label for="">Isi Catatan</label>
                    <textarea id="catatan" name="isiCatatan" class="form-control mb-2" style="min-height: 13rem"></textarea>
                    <input type="hidden" name="latihan_id" value="{{ $latihan->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>


    <div class="modal fade" id="updateCatatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content" id="updateCatatanPelatihForm">
        
        </div>
        </div>
    </div>
    
@elseif(Auth::user()->role_id == 3) 
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahCatatanPartnerModal">Tambah Catatan partner</button>
    @if($pasangan->id_atlet_1 == Auth::user()->atlet->id)
        <div class="modal fade" id="tambahCatatanPartnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Catatan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/atlet/latihan/detail_latihan/'.$jadwalLatihan->id.'/tambahCatatanPartner') }}">
                            @csrf
                            <label for="">nama catatan</label>
                            <input type="text" id="namaCat" name="namaCatatan" class="form-control">
                            <label for="">Isi Catatan partner</label>
                            <textarea id="catatan" name="isiCatatan" class="form-control mb-2" style="min-height: 13rem"></textarea>
                            <input type="hidden" name="atlet_id" value="{{ $pasangan->id_atlet_2 }}">
                            <input type="hidden" name="latihan_id" value="{{ $latihan->id }}">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="tambahCatatanPartnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Catatan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/atlet/latihan/detail_latihan/'.$jadwalLatihan->id.'/tambahCatatanPartner') }}">
                            @csrf
                            <label for="">nama catatan</label>
                            <input type="text" id="namaCat" name="namaCatatan" class="form-control">
                            <label for="">Isi Catatan partner</label>
                            <textarea id="catatan" name="isiCatatan" class="form-control mb-2" style="min-height: 13rem"></textarea>
                            <input type="hidden" name="atlet_id" value="{{ $pasangan->id_atlet_1 }}">
                            <input type="hidden" name="latihan_id" value="{{ $latihan->id }}">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="card rounded-3 mt-3">
        <div class="card-body">
            <div class="h6 font-weight-bold">{{ $jadwalLatihan->id }} / {{ $jadwalLatihan->nama }}</div>
            <div class="text-primary">Tanggal Pelaksanaan : {{ $jadwalLatihan->tanggal_latihan}}</div>  
            <div class="text-primary">Jam Latihan : {{ $jadwalLatihan->jam_latihan }}</div>
            <div class="text-primary">Lokasi : {{ $jadwalLatihan->lokasi }}</div>
            <div class="text-primary">Pelatih : {{ $jadwalLatihan->pelatih->nama }}</div>
            <div class="text-primary">Pasangan : {{$pasangan->atlet_1->nama}} - {{$pasangan->atlet_2->nama}}</div>
        </div>
    </div>
    <nav class="mt-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-cat-pelatih-tab" data-bs-toggle="tab" data-bs-target="#cat-pelatih" type="button" role="tab" aria-controls="cat-pelatih" aria-selected="true">Catatan Pelatih</button>
            <button class="nav-link" id="nav-cat-diri-tab" data-bs-toggle="tab" data-bs-target="#cat-diri" type="button" role="tab" aria-controls="cat-diri" aria-selected="false">Catatan Diri</button>     
            <button class="nav-link" id="nav-cat-partner-tab" data-bs-toggle="tab" data-bs-target="#cat-partner" type="button" role="tab" aria-controls="cat-partner" aria-selected="false">Catatan Partner</button>     
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        {{-- Catatan Pelatih --}}
        <div class="tab-pane slide-in-right show active" id="cat-pelatih" role="tabpanel" aria-labelledby="nav-cat-pelatih-tab" tabindex="0">   
            <div id="accordionOne" class="border rounded">
                @foreach($latihan->catatanPelatih AS $item) 
                 
                    @if($item->pasangan->atlet_1->id == Auth::user()->atlet->id || $item->pasangan->atlet_2->id == Auth::user()->atlet->id)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link link-underline link-underline-opacity-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $item->id }}" aria-expanded="false" aria-controls="collapseOne">
                                    {{ $item->id }} - {{ $item->nama_catatan }} 
                                </button>
                                </h5>
                            </div>
                
                            <div id="collapseOne-{{ $item->id }}" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                                <div class="card-body">
                                    <div class="row row-cols-2 ms-auto me-auto" style="min-height: 15rem">
                                        <div class="col border border-2">
                                            <h5 class="m-1">Catatan Diri</h5>
                                            <p>{{ $item->catatan_diri}}</p>
                                        </div>
                                        <div class="col border border-2 ms-auto me-auto" >
                                            <h5 class="m-1">Catatan Pelatih</h5>
                                            <p>{{ $item->catatan_pelatih}}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    {{-- <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#tambahCatatanDiriModal"  onclick="getDataCatatanPelatih({{$item->id}}, {{ $latihan->jadwal_latihan_id }})">Tambah Catatan</button> --}}
                                    <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#tambahCatatanDiriPelatihModal">Edit Catatan</button>
                                    <button class="btn btn-primary m-2" >remove</button>
                                </div>
                            </div>

                        </div> 

                        <div class="modal fade" id="tambahCatatanDiriPelatihModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah/Edit Catatan Diri</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('/atlet/latihan/detail_latihan/'.$jadwalLatihan->id.'/tambahCatatanDiri') }}">
                                        @csrf
                                        <label for="">Isi Catatan</label>
                                        <textarea id="catatan" name="isiCatatan" class="form-control mb-2" style="min-height: 13rem">{{ $item->catatan_diri }}</textarea>
                                        <input type="hidden" name="catatan_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                            </div>
                        </div>

                    @endif     
                @endforeach
            </div>
        </div>

        {{-- Catatan Diri --}}
        <div class="tab-pane slide-in-right" id="cat-diri" role="tabpanel" aria-labelledby="nav-cat-diri-tab" tabindex="0">
            <div id="accordionTwo" class="border rounded">
                @foreach($latihan->catatanPartner as $item) 
                    {{-- @if($pasangan->atlet_1->id == Auth::user()->atlet->id) --}}
                        @if($item->atlet_id == Auth::user()->atlet->id  )
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link link-underline link-underline-opacity-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo-{{ $item->id }}" aria-expanded="false" aria-controls="collapseOne">
                                        {{ $item->id }} - {{ $item->nama_catatan }} 
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo-{{ $item->id }}" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                                    <div class="card-body">
                                        <div class="row row-cols-2 ms-auto me-auto">
                                            <div class="col border border-2">
                                                <h5 class="m-1">Catatan Diri</h5>
                                                <p>{{ $item->catatan_diri}}</p>
                                            </div>
                                            <div class="col border border-2 ms-auto me-auto" >
                                                <h5 class="m-1">Catatan Partner</h5>
                                                
                                                <p>{{ $item->catatan_partner}}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#updateCatatanDiri"  onclick="getDetailCatatanDiri({{$item->id}}, {{ $latihan->jadwal_latihan_id }})">Edit Catatan</button>
                                        <button class="btn btn-primary m-2" >remove</button>
                                    </div>
                                </div>
                            </div> 
                        @endif
                    {{-- @endif --}}
                @endforeach
            </div>    
            <div class="modal fade" id="updateCatatanDiri"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="updateCatatanDiriModal">
                    
                    </div>
                </div>
            </div>
        </div>

        {{-- Catatan Partner --}}
        <div class="tab-pane slide-in-right" id="cat-partner" role="tabpanel" aria-labelledby="nav-cat-partner-tab" tabindex="0">
            <div id="accordionThree" class="border rounded">
                @foreach($latihan->catatanPartner AS $item)   
                    @if($pasangan->atlet_1->id == Auth::user()->atlet->id)
                        @if($item->atlet_id == $pasangan->atlet_2->id)
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link link-underline link-underline-opacity-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree-{{ $item->id }}" aria-expanded="false" aria-controls="collapseOne">
                                        {{ $item->id }} - {{ $item->nama_catatan }} 
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseThree-{{ $item->id }}" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionThree">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-12 border border-2 ms-auto me-auto" >
                                                <h5 class="m-1">Catatan Partner</h5>
                                                <p>{{ $item->catatan_partner}}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#updateCatatanPartner"  onclick="getDetailCatatanPartner({{$item->id}}, {{ $latihan->jadwal_latihan_id }})">Edit Catatan</button>
                                        <button class="btn btn-primary m-2" >remove</button>
                                    </div>
                                </div>
                            </div>     

                            {{-- <div class="modal fade" id="updateCatatanPartnerModal_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah/Edit Catatan Diri</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ url('/atlet/latihan/detail_latihan/'.$jadwalLatihan->id.'/tambahCatatanPartner') }}">
                                                @csrf
                                                <label for="">nama catatan</label>
                                                <input type="text" id="namaCat" name="namaCatatan" class="form-control">
                                                <label for="">Isi Catatan partner</label>
                                                <textarea id="catatan" name="isiCatatan" class="form-control mb-2" style="min-height: 13rem">{{ $item->catatan_partner }}</textarea>
                                                <input type="hidden" name="atlet_id" value="{{ $item->atlet_id }}">
                                                <input type="hidden" name="catatan_id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endif
                    @elseif($pasangan->atlet_2->id == Auth::user()->atlet->id)
                        @if($item->atlet_id == $pasangan->atlet_1->id)
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link link-underline link-underline-opacity-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree-{{ $item->id }}" aria-expanded="false" aria-controls="collapseOne">
                                        {{ $item->id }} - {{ $item->nama_catatan }} 
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseThree-{{ $item->id }}" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionThree">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-12 border border-2" >
                                                <h5 class="m-1">Catatan Partner</h5>
                                                <p>{{ $item->catatan_partner}}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#updateCatatanPartner"  onclick="getDetailCatatanPartner({{$item->id}}, {{ $latihan->jadwal_latihan_id }})">Edit Catatan</button>
                                        <button class="btn btn-primary m-2" >remove</button>
                                    </div>
                                </div>
                            </div> 
                        @endif
                    @endif
                @endforeach
            </div>    
            
            <div class="modal fade" id="updateCatatanPartner"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" id="updateCatatanPartnerModal">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

@endif
 
   

    
@endsection
@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
function getDetailCatatanPelatih(catatan_id, jadwal_latihan_id)
{
    $.ajax({
        type:'POST',
        url:'/pelatih/latihan/detail_latihan/'+jadwal_latihan_id+'/getEditCatatanForm',
        data:{'_token':'<?php echo csrf_token() ?>', 
            'catatan_id':catatan_id,
            'jadwal_latihan_id':jadwal_latihan_id},
        success: function(data){
            $('#updateCatatanPelatihForm').html(data.msg);
        }
    });

}

 
function getDetailCatatanDiri(catatan_id, jadwal_latihan_id)
{
    $.ajax({
        type:'POST',
        url:'/atlet/latihan/detail_latihan/'+jadwal_latihan_id+'/getEditCatatanDiriForm',
        data:{'_token':'<?php echo csrf_token() ?>', 
            'catatan_id':catatan_id,
            'jadwal_latihan_id':jadwal_latihan_id},
        success: function(data){
            $('#updateCatatanDiriModal').html(data.msg);
        }
    });
}

function getDetailCatatanPartner(catatan_id, jadwal_latihan_id)
{
    $.ajax({
        type:'POST',
        url:'/atlet/latihan/detail_latihan/'+jadwal_latihan_id+'/getEditCatatanPartnerForm',
        data:{'_token':'<?php echo csrf_token() ?>', 
            'catatan_id':catatan_id,
            'jadwal_latihan_id':jadwal_latihan_id},
        success: function(data){
            $('#updateCatatanPartnerModal').html(data.msg);
        }
    });
}

</script>
@endsection

