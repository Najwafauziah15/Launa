{{-- form atas 1 --}}
<form action="{{ route('pembelian.store') }}" method="post" id="formTransaksi" class="form-horizontal form-label-left input_mask">
@csrf

    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
        <label for="" class="control-label col-md-6 col-sm-6 col-xs-6"> Tanggal Pembelian</label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="date" class="date-picker form-control col-md-12 col-xs-12" value="{{ date('Y-m-d') }}" name="tanggal_masuk" required>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
        <label for="" class="control-label col-md-6 col-sm-6 col-xs-6"> Pelanggan </label>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <select name="pemasok_id" id="" class=" form-control col-md-12 col-xs-12">
                <option value="">-pilih-</option>
                @foreach ($pemasok as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pemasok }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- button tanggal pembelian dan tambah barang --}}
    <div class="col-md-6 col-sm-6 col-xs-6 form-group">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <button type="button" class="btn btn-outline-secondary" id="tambahBarangBtn" data-toggle="modal"
            data-target="#tblBarangModal">Tambah Barang</button>
        </div>
    </div>

    {{-- detail pembelian --}}
    <div>
        <div class="card-box table-responsive">
            <table id="tblTransaksi" class="table table-striped table-bordered bulk_action" style="width:100%">
            <thead>
                <tr>
                    <th>Kode barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td colspan="6" style="text-align: center"><i>Belum Ada Data</i></td>
                </tr> --}}
            </tbody>
            </table>
        </div>
    </div>

    {{-- bagian total submit data hidden --}}
    <div class="row" style="text-align: right; margin-bottom:10px">
        <div class="col-md-12">
            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6" style="text-align: right">
                {{-- <label for="" class="control-labe col-sm-3 col-xs-12 col-md-6 col-xs-12">
                    Total Harga
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: right;margin-right:0;padding-right:0">
                    <input type="text" name="sub_total" id="totalHarga" class="form-control col-md-6 col-xs-12" required>
                </div> --}}
                <div class="card">
                    <div class="card-body bg-dark">
                        <h5 style="color: white; text-align:center">Total Harga</h5>
                        <h1>
                        <input type="text" name="total" id="totalHarga" style="text-align: center;color: white" class="col-md-12 col-sm-12 col-xs-12 col-md-offset-6 bg-dark" readonly>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12" style="text-align: right;margin-right:0;padding-right:0">
            <div class="col-md-12 col-sm-9 col-xs-12">
                <button type="submit" class="btn btn-outline-success">Simpan Transaksi</button>
            </div>
        </div>
    </div>

    {{-- modal barang --}}
    <div class="modal fade" id="tblBarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">
                     PILIH BARANG   
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Tabel Data Barang</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Settings 1</a>
                                      <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                            <div class="clearfix"></div>
                            </div>
                                <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="tblBarang2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barang as $b)
                                            <tr>
                                                <td>
                                                    {{ $i=(isset($i)?++$i:$i=1) }}
                                                    <input type="hidden" class="idBarang" value="{{ $b->id }}">
                                                </td>
                                                <td>{{ $b->kode_barang }}</td>
                                                <td>{{ $b->nama_barang }}</td>
                                                <td>{{ $b->harga_jual }}</td>
                                                <td><button class="pilihBarangBtn" type="button">Pilih</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</form>
{{-- form bawah 1 --}}