<div class="modal fade text-left" id="editOperator-{{$operator->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditOperator"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditOperator">Modal Edit Operator</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('petugas.update', $operator->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label>Nama Opeator: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nama Operator" class="form-control" name="nama" value="{{old('nama', $operator->nama)}}" required>
                    </div>
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="email" placeholder="Email" class="form-control" name="email" value="{{old('email', $operator->email)}}" required>
                    </div>
                    <label>Username: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Username" class="form-control" name="username" value="{{old('username', $operator->username)}}" required>
                    </div>
                    <label>Password: </label>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password" required>
                    </div>
                    <label>No HP / WA: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Nomor HP" class="form-control" value="{{old('no_hp', $operator->no_hp)}}" name="no_hp">
                    </div>
                    <label>Role: </label>
                    <div class="form-group">
                        <select name="role" class="form-select">
                            <option value="{{old('role', $operator->role)}}" selected>{{$operator->role}}</option>
                            <option value="operator">Operator</option>
                            <option value="kepala">Kepala Bagian</option>
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
