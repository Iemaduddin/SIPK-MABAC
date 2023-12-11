<div class="modal fade text-left" id="tambahAlternatif" tabindex="-1" role="dialog" aria-labelledby="modalTambahAlternatif"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahKriteria">Modal Tambah Alternatif</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('mahasiswa.create') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-6">

                            <h6>Nama Lengkap</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap"
                                    name="nama" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>NIK</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Nomor Induk Kependudukan" name="nik" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>Tempat Lahir</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Tempat Lahir"
                                    name="tempat_lahir" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                            </div>

                            <h6>Tanggal Lahir</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="date" class="form-control form-control-lg" name="tanggal_lahir"
                                    required>
                                <div class="form-control-icon">
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>

                            <h6>Jenis Kelamin</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="jk" class="form-control form-control form-control-lg">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h6>Alamat</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Alamat"
                                    name="alamat">
                                <div class="form-control-icon">
                                    <i class="bi bi-map"></i>
                                </div>
                            </div>
                            <h6>Nomor HP / WA</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="No. Hp / WA"
                                    name="no_hp" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>

                            <h6>Email</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Email"
                                    name="email" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>Username</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username"required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>Password</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="password" class="form-control form-control-lg" placeholder="Password"
                                    name="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
