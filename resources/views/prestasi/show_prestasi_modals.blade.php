{{-- <div class="portlet">
    <div class="portlet-title">
        <b>Tampilan Transaksi dari: {{ $data->id }} - {{ $data->transaction_date }}</b>
    </div>
    <div class="portlet-body">
        <div class="row">
            @foreach($dataProduct as $value)
                <div class="col-md-4">
                    <div class="thumbnail" >
                        <img src="{{ asset('images/'.$value->image) }}" alt="">
                        <div class="caption">
                            <p align='center'><b>{{ $value->name }}</b></p>
                            <hr/>
                            <p>Kategori : {{ $value->categories->name }}</p>
                            <p>Harga : Rp. {{ $value->price }}</p>
                            <p>Jumlah beli : {{ $value->pivot->quantity }}</p>
                        </div>           
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
 --}}
