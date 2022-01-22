<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formEditModal{{ $p->id }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Edit Data Pengguna</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pengguna.update',$p->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div id="method"></div>
                                    <div class="card-body">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" id="nama" name="nama" value="{{ $p->nama }}" class="form-control" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" id="alamat" name="alamat" value="{{ $p->alamat }}" class="form-control" placeholder="Alamat" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="jenis_kelamin" name="jenis_kelamin">
                                                <option selected value="{{ $p->jenis_kelamin }}">{{ $p->jenis_kelamin }}</option>
                                                <option name="jenis" value="L">Laki-Laki</option>
                                                <option name="jenis" value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tlp" class="form-label">Nomor Telepon</label>
                                            <input type="text" id="tlp" name="tlp" value="{{ $p->tlp }}" class="form-control" placeholder="Nomor Telepon/Handphone" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submit" class="btn btn-info">Edit Pengguna</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->