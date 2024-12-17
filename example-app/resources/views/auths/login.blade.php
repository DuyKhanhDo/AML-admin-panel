@extends('layouts.auth.app')

@section('content')
<div class="container" style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center" style="height: 100%;">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Đăng nhập') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Địa chỉ email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mật khẩu') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Ghi nhớ đăng nhập') }}</label>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Đăng nhập') }}</button>
                        </div>
                    </form>
                    
                    <!-- Thêm dòng đăng ký -->
                    <div class="mt-3 text-center">
                        <span>{{ __('Chưa có tài khoản?') }}</span>
                        <a href="{{ route('viewregister') }}">{{ __('Đăng ký ngay') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
