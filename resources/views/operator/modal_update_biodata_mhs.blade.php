<div class="modal fade text-left" id="updateBiodataMhs-{{ $mahasiswa->id ?? auth()->user()->mahasiswa_id }}" tabindex="-1"
    role="dialog" aria-labelledby="modalUpdateBiodataMhs" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateBiodataMhs">Update Biodata</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('update.biodata', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-6">

                            <h6>Nama Lengkap</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $mahasiswa->nama }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>NIK</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Nomor Induk Kependudukan" name="nik" value="{{ $mahasiswa->nik }}"
                                    required>
                                <div class="form-control-icon">
                                    <i class="bi bi-card-text"></i>
                                </div>
                            </div>

                            <h6>Tempat Lahir</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                            </div>

                            <h6>Tanggal Lahir</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="date" class="form-control form-control-lg" name="tanggal_lahir"
                                    value="{{ $mahasiswa->tanggal_lahir }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>

                            <h6>Jenis Kelamin</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="jk" class="form-control form-control-lg">
                                    <option selected value="{{ $mahasiswa->jk }}">{{ $mahasiswa->jk }}</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            {{-- <h6>Provinsi</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="province" id="province" class="form-control form-control-lg">
                                    <option value="">
                                        @if ($mahasiswa->province == null)
                                            == Pilih Provinsi ==
                                        @else
                                            {{ $mahasiswa->province }}
                                        @endif
                                    </option>
                                    @foreach ($provinces as $code => $name)
                                        <option value="{{ $code }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo"></i>
                                </div>
                                <div class="invalid-feedback">Pilih Provinsi Anda!</div>
                            </div> --}}

                            {{-- <h6>Kabupaten/Kota</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="city" id="city" class="form-control form-control-lg">
                                    <option value="">
                                        @if ($mahasiswa->city == null)
                                            == Pilih Kota ==
                                        @else
                                            {{ $mahasiswa->city }}
                                        @endif
                                    </option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo"></i>
                                </div>
                                <div class="invalid-feedback">Pilih Kota Anda!</div>
                            </div>

                            <h6>Kecamatan</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="district" id="district" class="form-control form-control-lg">
                                    <option value="">
                                        @if ($mahasiswa->district == null)
                                            == Pilih Kecamatan ==
                                        @else
                                            {{ $mahasiswa->district }}
                                        @endif
                                    </option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo"></i>
                                </div>
                                <div class="invalid-feedback">Pilih Kecamatan Anda!</div>
                            </div>
                            <h6>Kelurahan/Desa</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="village" id="village" class="form-control form-control-lg">
                                    <option value="">
                                        @if ($mahasiswa->village == null)
                                            == Pilih Kelurahan/Desa ==
                                        @else
                                            {{ $mahasiswa->village }}
                                        @endif
                                    </option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo"></i>
                                </div>
                                <div class="invalid-feedback">Pilih Kelurahan/Desa Anda!</div>
                            </div> --}}
                            <h6>Alamat Lengkap</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Alamat"
                                    name="alamat" value="{{ $mahasiswa->alamat }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-map"></i>
                                </div>
                            </div>
                            <h6>Email</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Email"
                                    name="email" value="{{ $mahasiswa->email }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>

                            <h6>Username</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username" value="{{ $mahasiswa->username }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <h6>Nomor HP / WA</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="No. Hp / WA"
                                    name="no_hp" value="{{ $mahasiswa->no_hp }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>
                            <h6>Password</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    value="{{ old('password', $mahasiswa->password) }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-key"></i>
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
                <script src="{{ asset('assets/js/pages/password_eyes_update_biodata_pgw.js') }}"></script>
            </form>
            {{-- @push('scripts')
                {{-- Penting --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                <script>
                    window.addEventListener("DOMContentLoaded", function() {
                        const populateCities = province => {
                            axios.post('{{ route('operator.getCity') }}', {
                                    code: province
                                })
                                .then(function(response) {
                                    $('#city').empty();
                                    $('#city').append(new Option('== Pilih Kota ==', ''))
                                    $('#district').empty();
                                    $('#district').append(new Option('== Pilih Kecamatan ==', ''))
                                    $('#village').empty();
                                    $('#village').append(new Option('== Pilih Kelurahan/Desa ==', ''))
                                    $.each(response.data, function(code, name) {
                                        $('#city').append(new Option(name, code))
                                    })
                                })
                        }
                        const populateDistricts = city => {
                            axios.post('{{ route('operator.getDistrict') }}', {
                                    code: city
                                })

                                .then(function(response) {
                                    $('#district').empty();
                                    $('#district').append(new Option('== Pilih Kecamatan ==', ''))
                                    $('#village').empty();
                                    $('#village').append(new Option('== Pilih Kelurahan/Desa ==', ''))
                                    $.each(response.data, function(code, name) {
                                        $('#district').append(new Option(name, code))
                                    })
                                });
                        }

                        const populateVillages = district => {
                            axios.post('{{ route('operator.getVillage') }}', {
                                    code: district
                                })

                                .then(function(response) {
                                    $('#village').empty();
                                    $('#village').append(new Option('== Pilih Kelurahan/Desa ==', ''))
                                    $.each(response.data, function(code, name) {
                                        $('#village').append(new Option(name, code))
                                    })
                                });
                        }

                        $('#province').on('change', function() {
                            console.log('Province selected:', $(this).val());
                            populateCities($(this).val());
                        });

                        $('#city').on('change', function() {
                            console.log('City selected:', $(this).val());
                            populateDistricts($(this).val());
                        });

                        $('#district').on('change', function() {
                            console.log('District selected:', $(this).val());
                            populateVillages($(this).val());
                        });
                    });
                </script> --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}
            {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            {{-- @endpush --}}

        </div>
    </div>
</div>
