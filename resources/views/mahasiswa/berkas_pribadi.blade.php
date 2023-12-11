<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('berkas.pribadi')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Berkas Pribadi</label>
                        <input class="form-control" type="file" id="formFile" name="berkas_pribadi" required>
                        <span class="text-secondary"><sub>*.zip/rar (KTP, KK, KTM, Surat
                                Bukan
                                ASN, Surat Tidak Menerima Beasiswa Dari Sumber Lain,
                                Surat Aktif Kuliah, Surat Permohonan Bantuan Studi,
                                Proposal/Skripsi, Fotocopy Buku Rekening)</sub> </span>
                    </div>
                    @if($mahasiswa->berkas_beasiswa == null)
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Berkas Beasiswa</label>
                        <input class="form-control" type="file" id="formFile" name="berkas_beasiswa" required>
                        <span class="text-secondary"><sub>*.zip/rar
                                (@foreach ($kriterias as $kriteria)
                                {{$kriteria->kriteria}},
                                @endforeach)</sub> </span>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>