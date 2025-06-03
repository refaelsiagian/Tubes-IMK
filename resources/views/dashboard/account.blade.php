@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Akun</h3>
</div>

<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                Tambah Admin
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" style="min-width: 800px; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal ditambahkan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        @if($admin->status == 'active')
                                        <span class="badge rounded-pill bg-success">Aktif</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-reference="parent">
                                            <span class="sr-only">Status</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <h6 class="dropdown-header">Status</h6>

                                            @if($admin->status == 'active')
                                            <form action="{{ route('account.deactivate', $admin->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link">
                                                    Nonaktifkan
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('account.activate', $admin->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item btn-link">
                                                    Aktifkan
                                                </button>
                                            </form>
                                            @endif

                                            <!-- Tombol Reset Password (trigger modal) -->
                                            <button type="button" class="dropdown-item btn-link" data-bs-toggle="modal"
                                                data-bs-target="#resetModal" data-id="{{ $admin->id }}">
                                                Reset Password
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--Confirm create Modal -->
<div class="modal modal-borderless fade text-left" id="createModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Admin Baru</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('account.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Masukkan nama dengan benar karena data tidak dapat diubah. Password akan dibuat otomatis.</p>

                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required autofocus placeholder="Masukkan nama">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Reset Password -->
<div class="modal modal-borderless fade text-left" id="resetModal" tabindex="-1" role="dialog"
    aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="resetModalLabel">Reset Password</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="resetPasswordForm" action="{{ route('account.reset-password') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="resetId">
                <div class="modal-body">
                    <p>Yakin ingin reset password?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Bootstrap -->
<div class="modal fade" id="newAdminModal" tabindex="-1" aria-labelledby="newAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newAdminModalLabel">{{ session('title') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p>ID: <strong>{{ session('new_id') }}</strong></p>
        <p>Nama: <strong>{{ session('new_name') }}</strong></p>
        <p>Password: <strong id="passwordText">{{ session('new_password') }}</strong></p>
        <p class="text-danger">Salin password ini sekarang! Setelah modal ditutup, password tidak akan bisa dilihat lagi.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Script untuk show modal otomatis -->
@if(session('new_password'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('newAdminModal'));
    myModal.show();
  });
</script>
@endif


@endsection

@section('script')
<script>
    const resetModal = document.getElementById('resetModal');
    resetModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const adminId = button.getAttribute('data-id');
        const inputId = resetModal.querySelector('#resetId');
        inputId.value = adminId;
    });
</script>
@endsection
