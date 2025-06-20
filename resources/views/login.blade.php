@extends('layout')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-4">
        <h2 class="text-center mb-4">Вход в систему</h2>
        <form method="post" action="{{ url('auth') }}">
            @csrf

            {{-- Поле для ввода Email/Логина --}}
            <div class="mb-3">
                <label for="email" class="form-label">Логин (Email)</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') }}" required placeholder="Введите ваш email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Поле для ввода Пароля --}}
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" required placeholder="Введите ваш пароль">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Кнопка "Войти" --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </form>
    </div>
</div>
@endsection
