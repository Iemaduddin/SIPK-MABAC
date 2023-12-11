{{-- Edit Kriteria --}}
<div class="card col-sm-12">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="nav-editKriteriaMahasiswa-{{$mahasiswa->id}}" role="tabpanel"
            aria-labelledby="nav-edit-kriteria-mahasiswa">
            <div class="d-flex justify-content-center">
                <form class="form form-vertical col-sm-4" action="{{route('beasiswa.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    @forelse ($kriterias as $kriteria)
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">{{$kriteria->kriteria}}</label>
                            <div class="position-relative">
                                <select name="subkriteria_id[]" class="form-select form-control form-control-lg">
                                    @forelse ($kriteria->subkriteria as $subkriteria)
                                    <option value="{{$subkriteria->id}}">{{$subkriteria->subkriteria}}
                                    </option>
                                    @empty
                                    <option value="#">Tidak Ada Subkriteria</option>
                                    @endforelse
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3>Belum Ada Kriteria</h3>
                    @endforelse
                    @if ($kriterias != null)

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                    @endif
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End Edit --}}