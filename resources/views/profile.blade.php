@extends( Auth::user()->role_id == 3 ? 'atlet.layout.halaman_utama' : (Auth::user()->role_id == 2 ? 'pelatih.layout.halaman_utama' : 'admin.layout.halaman_utama') )


@section('konten')
@if(Auth::user()->role_id == 2)
@foreach ($pelatih as $item)
<form action="{{ url('/pelatih/profile/update/'.$item->id) }}" method="POST">
    @csrf
    {{-- @method("PUT")  --}}
    <div class="container rounded bg-white mt-1 mb-3">
        <div class="mt-5 mb-3">
            <h4 class="text-center">Profile Settings</h4>
        </div>
        <div class="border-right text-center">
            <div class="d-flex flex-column align-items-center text-center p-3">
                <img class="rounded-circle" width="150px" src={{ asset('img/765-default-avatar.png') }}>
                <span class="text-black-50"><a href="#">Change Profile Picture</a></span>
            </div>
        </div>
        <div class="border-right">
            <div class="p-3 py-5">
                <div class="row mt-2">
                    
                        <div class="col-md-12 mb-2"><label class="labels">Nama lengkap</label><input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" value={{ $item->nama }}></div>
                        <div class="col-md-12 mb-2"><label class="labels">nomor Telepon</label><input name="telp" type="text" class="form-control" placeholder="enter phone number" value={{ $item->telp }}></div>
                        <div class="col-md-12 mb-2"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="Email" value={{ $item->email }}></div>
                        {{-- <div class="col-md-12 mb-2"><label class="labels">Password</label><input name="email" type="text" class="form-control" placeholder="Email" value={{ $item->user->password }}></div> --}}
                </div> 
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</form>
@endforeach

@elseif(Auth::user()->role_id == 3)
@foreach($atlet as $item) 
<form action="{{ url('/atlet/profile/update/'.$item->id) }}" method="POST">
    @csrf
    {{-- @method("PUT")b  --}}
    <div class="container rounded bg-white mt-1 mb-5">
        <div class="mt-5 mb-3">
            <h4 class="text-center">Profile Settings</h4>
        </div>
        <div class=" text-center">
            <div class="d-flex flex-column align-items-center text-cente p-3">
                <img class="rounded-circle" width="150px" src={{ asset('img/765-default-avatar.png') }}>
                <span class="text-black-50"><a href="#">Change Profile Picture</a></span>
            </div>
        </div>
        <div >
                <div class="row justify-content-center">
                        <h3 class="col-md-12 col-sm-12 mb-3">Data Pribadi</h3>
                        <div class="col-md-12 col-sm-12 mb-3"><label class="labels">Nama Lengkap</label><input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" value="{{$item->nama }}"></div>
                        <div class="col-md-12 col-sm-12 mb-3"><label class="labels">Nama Panggilan</label><input name="nama_panggilan" type="text" class="form-control" placeholder="Nama Panggilan" value="{{ $item->nama_panggilan}}"></div>
                        
                        <div class="col-md-6 col-sm-6 mb-3"><label class="labels">Tempat lahir</label><input name="tempat_lahir" type="text" class="form-control" placeholder="Tanggal Lahir" value="{{ $item->tempat_lahir}}"></div>
                        <div class="col-md-6 col-sm-6 mb-3"><label class="labels">Tanggal lahir</label><input name="tanggal_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" value="{{$item->tanggal_lahir}}"></div>
                        <div class="col-md-12 col-sm-12 mb-3"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="Email" value={{ $item->email }}></div>
                        <div class="col-md-12 col-sm-12 mb-3"><label class="labels">Password</label><input name="email" type="text" class="form-control" placeholder="Email" value={{ $item->email }}></div>
                        <div class="col-md-12 col-sm-12 mb-3"><label class="labels">nomor Telepon</label><input name="telp" type="text" class="form-control" placeholder="enter phone number" value={{ $item->telp }}></div>
                </div> 
        </div>
        <div class="text-center mb-5 mt-2  "><button class="btn btn-primary profile-button w-100" type="submit">Save Update</button></div>

        <div class="">
            <div class="row justify-content-center">
                        <h3 class="col-md-12 col-sm-12 mb-3 ">Data Organisasi & Prestasi</h3>
                        <div class="col-md-12 col-sm-12 mb-3 "><label class="labels">Cabang</label><input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" value="{{!empty($item->gabsi)?$item->gabsi->nama:'' }}" disabled></div>
                        <div class="col-md-12 col-sm-12 mb-3 "><label class="labels">Total Point</label><input name="nama_panggilan" type="text" class="form-control" placeholder="Nama Panggilan" value="{{ $item->total_point}}" disabled></div>
                        <div class="col-md-12 col-sm-12 mt-3">
                            <table id="listPrestasi" class="table table-striped table-bordered " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nomor Spesialis</th>
                                        <th>Nama kejuraan</th> 
                                        <th>peringkat</th>
                                        <th>poin</th>
                                        <th>keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->prestasis as $prestasi)
                                        <tr>
                                            <td >{{ $prestasi->nomor_spesialis }}</td>
                                            <td >{{ $prestasi->kejuaraan->nama }}</td>
                                            <td >{{ $prestasi->peringkat }}</td>
                                            <td >{{ $prestasi->point }}</td>
                                            <td >{{ $prestasi->keterangan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    
                                </tfoot>
                            </table>
                        </div>
            </div>       
        </div> 
        {{-- <div class="text-center mb-5 mt-2  "><button class="btn btn-primary profile-button w-100" type="submit">Update Data Prestasi</button></div> --}}
        
    </div>
   
</form> 
@endforeach
@else
<div class="container rounded bg-white mt-1 mb-3">
        
    <div class="border-right text-center ">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
    </div>
    

    <div class="border-right">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Profile Settings</h4>
            </div>
            <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                
            </div>
            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>

            </div>
            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
        </div>
    </div>

</div>
@endif
@endsection

@section('javascript')
<script>
$(document).ready( function () {
    $('#listPrestasi').DataTable({
        scrollX: true,  
        responsive:true,
        // dom: '<"toolbar w-25">frtip'
    });
    // document.querySelector('div.toolbar').innerHTML = '<button id="btnTambahData" class="btn btn-primary profile-button" type="submit">Tambah Data</button>';
});


</script>
@endsection

@section('style')
<style>
    /* .dataTables_filter{
        float: right;
    } */
    .toolbar{
        float: left;
    }
/* 
    div.dataTables_wrapper {
            width: 850px;
            margin: 0 auto;
        } */
    @media only screen and (min-width:280px) and (max-width: 768px)  {
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
