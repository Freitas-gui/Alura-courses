@extends('layout')

@section('head')
    Login
@endsection

@section('content')
    @include('errors', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Login
        </button>

        <a href="/myRegister" class="btn btn-secondary mt-3">
            Register
        </a>
    </form>
@endsection
