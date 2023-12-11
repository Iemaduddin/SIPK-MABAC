<div class="modal fade text-left" id="editKriteria-{{$kriteria->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditKriteria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditKriteria">Modal Edit Kriteria </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('kriteria.update', $kriteria->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label>Kode: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Kode Kriteria" class="form-control" name="kode" value="{{old('kode', $kriteria->kode)}}" required>
                    </div>
                    <label>Kriteria: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Kriteria" class="form-control" name="kriteria" value="{{old('kode', $kriteria->kriteria)}}" required>
                    </div>
                    <label>Bobot: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Bobot" class="form-control" name="bobot" value="{{old('kode', $kriteria->bobot)}}" required>
                    </div>
                    <label>Jenis: </label>
                    <div class="form-group">
                        <select name="jenis" class="form-select">
                            <option value="{{old('jenis', $kriteria->jenis)}}">{{$kriteria->jenis}}</option>
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