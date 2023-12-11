<div class="modal fade text-left" id="tambahKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahKriteria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahKriteria">Modal Tambah Kriteria</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('kriteria.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Kode: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Kode Kriteria" class="form-control" name="kode" value="C{{ count($kriterias)+1 }}" readonly>
                    </div>
                    <label>Kriteria: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Kriteria" class="form-control" name="kriteria" required>
                    </div>
                    <label>Bobot: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Bobot" class="form-control" name="bobot" required>
                    </div>
                    <label>Jenis: </label>
                    <div class="form-group">
                        <select name="jenis" class="form-select">
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
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
