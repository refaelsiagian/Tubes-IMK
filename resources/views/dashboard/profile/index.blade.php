@extends('dashboard.layout.main')

@section('content')

<div class="page-heading">
    <h3>Profile</h3>
</div>
<div class="page-content"> 
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-info">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Pengguna</label>
                            <p class="form-control-plaintext">{{ auth()->user()->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Pengguna</label>
                            <p class="form-control-plaintext">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Role</label>
                            <p class="form-control-plaintext">{{ ucfirst(auth()->user()->role) }}</p>
                        </div>
                        @if(auth()->user()->email)
                            <div class="mb-3">
                                <label class="form-label fw-bold">Ubah Email</label>
                                <p class="form-control-plaintext">
                                    {{ auth()->user()->masked_email }}
                                    <small class="text-muted">(Utama, untuk reset password.)</small>
                                </p>

                                @if(auth()->user()->pending_email)
                                    <div class="form-control-plaintext">
                                        <span>{{ auth()->user()->masked_pending_email }}</span>
                                        <small class="text-muted">
                                            (Pending.
                                            <form action="{{ route('resend-email') }}" method="POST" class="d-inline m-0 p-0">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="font-size: inherit;">
                                                    Klik untuk kirim ulang verifikasi
                                                </button>
                                            </form>)
                                        </small>
                                    </div>
                                @endif

                                <div class="mt-2">
                                    <a href="{{ route('change-email.show') }}" class="btn btn-sm btn-outline-primary">Ubah</a>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ubah Password</label>
                            <div>
                                <a href="{{ route('profile.change-password') }}" class="btn btn-sm btn-outline-primary">Ubah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
