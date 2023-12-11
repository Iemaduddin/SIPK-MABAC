<div class="modal fade text-left" id="tambahSubkriteria" tabindex="-1" role="dialog"
    aria-labelledby="modalTambahSubkriteria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahSubkriteria">Model Tambah Subkriteria</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('subkriteria.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Subkriteria: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Subkriteria" class="form-control" name="subkriteria" required>
                    </div>
                    <label>Nilai: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nilai" class="form-control" name="nilai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" name="kriteria_id" value="{{$kriteria->id}}" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>