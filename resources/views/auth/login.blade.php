@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="card auth-card shadow-lg border-0 rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <!-- Alert Message -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="text-center mb-4">
                                <h2 class="fw-bold text-dark">To-Do-List</h2>
                                <p class="text-muted">Masuk ke akun Anda untuk mulai mengelola tugas</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" name="login"
                                            class="form-control border-start-0 @error('login') is-invalid @enderror"
                                            placeholder="Email atau Username" value="{{ old('login') }}" required autofocus>
                                    </div>
                                    @error('login')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-key"></i>
                                        </span>
                                        <input type="password" name="password"
                                            class="form-control border-start-0 @error('password') is-invalid @enderror"
                                            placeholder="Password" required>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-gradient w-100 mb-3 text-white fw-semibold">
                                    <span class="d-flex align-items-center justify-content-center">
                                        Masuk
                                        <i class="bi bi-box-arrow-in-right ms-2"></i>
                                    </span>
                                </button>

                                <div class="text-center">
                                    <a href="{{ route('register') }}" class="text-decoration-none text-primary">
                                        Belum punya akun? <u>Daftar sekarang</u>
                                    </a>
                                </div>

                                <div class="mt-4 pt-4 border-top">
                                    <div class="row g-4">
                                        @php
                                            $features = ['Task Management', 'Progress Tracking', 'Team Collaboration', 'Priority Settings'];
                                        @endphp
                                        @foreach ($features as $feature)
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="text-primary me-2">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </div>
                                                    <span class="small text-muted">{{ $feature }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan styling khusus -->
    <style>
        .btn-gradient {
            background: linear-gradient(90deg, #ff7e5f 0%, #feb47b 100%);
            border: none;
            transition: 0.3s ease-in-out;
        }

        .btn-gradient:hover {
            background: linear-gradient(90deg, #feb47b 0%, #ff7e5f 100%);
        }

        .auth-card {
            border-radius: 15px;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        .text-primary {
            color: #007bff !important;
        }
    </style>
@endsection