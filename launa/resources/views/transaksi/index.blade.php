@extends('template.header')

@section('content')

<!-- page content -->
    <div class="right_col" role="main">
    <!-- top tiles -->
       <div class="row" style="display: inline-block;" >
       <h1>TABEL PEMBELIAN</h1>
        </div>
    <!-- /top tiles -->
    <!--main content-->
    <div class="row">
        <div class="x-panel">
            <div class="x-content">
                {{-- card --}}
                <div class="card">
                    <div class="card-header">
                        Pembelian
                    </div>
                    <div class="card-content">
                        @include('operator.pembelian.form')
                    </div>
                    <div class="card-footer">
                        <div style="margin-top:20px">
                            @if (session('success'))
                            <div class="alert alert-success" role="alert" id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
        
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/main content-->
    </div>
<!-- /page content -->

@endsection
@push('script')
<script>
    let totalHarga = 0;
    function tambahBarang(a){
        let d = $(a).closest('tr');
        let kodeBarang = d.find('td:eq(1)').text();
        let namaBarang = d.find('td:eq(2)').text();
        let hargaBarang = d.find('td:eq(3)').text();
        let idBarang = d.find('.idBarang').val();
        // let idBarang = $(a).data('.idBarang');
        let data = '';
        let tbody = $('#tblTransaksi tbody tr td').text();
        data +='<tr>';
        data +='<td>'+kodeBarang+'</td>';
        data +='<td>'+namaBarang+'</td>';
        data +='<td>'+hargaBarang+'</td>';
        data +='<input type="hidden" name="barang_id[]" value="'+idBarang+'">'
        data +='<input type="hidden" name="harga_beli[]" value="'+hargaBarang+'">'
        // data +='<input type="hidden" name="sub_total[]" value="'+hargaBarang*parseInt($('#qty_barang').val())+'">'
        // data +='<td><input type="number" value="1" name="qty[]" class="qty"></td>';
        data +='<td><input type="number" value="1" min="1" name="jumlah[]" class="qty"></td>';
        // data +='<td><span class="subTotal">'+hargaBarang+'</span></td>';
        data +='<td><input type="text" readonly name="sub_total[]" class="subTotal" value="'+hargaBarang+'"></td>'
        data +='<td><button type="button" class="btnRemoveBarang btn btn-danger" >hapus</button></td>';
        data +='</tr>'
        if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

        $('#tblTransaksi tbody').append(data);
        totalHarga += parseFloat(hargaBarang);
        $('#totalHarga').val(totalHarga);
        $('#tblBarangModal').modal('hide');
    }

    function calcSubTotal(a){
        let qty = parseInt($(a).closest('tr').find('.qty').val());
        let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
        let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
        let subTotal = qty * hargaBarang;
        totalHarga += subTotal - subTotalAwal;
        $(a).closest('tr').find('.subTotal').text(subTotal);
        $('#totalHarga').val(totalHarga);
        
    }

    $(function(){
        $('#tblBarang2').DataTable();

        //pemilihan Barang
        $('#tblBarangModal').on('click','.pilihBarangBtn',function(){
            tambahBarang(this);
        });

        //change qty event
        $('#tblTransaksi').on('change','.qty',function(){
            calcSubTotal(this);
        })
        //remove Barang
        $('#tblTransaksi').on('click', '.btnRemoveBarang',function(){
            let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
            totalHarga -= subTotalAwal;

            $currentRow = $(this).closest('tr').remove();
            $('#totalHarga').val(totalHarga);
        })
    });

</script>
@endpush