@extends('templates.principal')

@section('title')
    Login
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div>
                <h2 style="color: #3E3767"><strong>O que é o sistema de almoxarifado?</strong></h2>
                <p style="color: #3E3767">
                    É uma aplicação web desenvolvido pela cooperação LMTS - UPE com o objetivo de informatizar o
                    gerenciamento do setor almoxarifado da UPE, auxiliando os responsáveis pelo almoxarifado nas suas rotinas de trabalho,
                     como gerenciar o estoques e servir entidades como professores e secretaria que requisitarem os materiais.
                </p>
                <h2 style="color: #3E3767"><strong>Quais são os benefícios?</strong></h2>
                <p style="color: #3E3767">
                    Um sistema informatizado permite maior praticidade e confiabilidade no gerenciamento do almoxarifado, permitindo uma visão
                    holística do setor. Além disso, o processo de solicitação, aprovação e controle se torna menos dispendioso e mais prático
                    tanto para o administrador quanto para o requerente.
                </p>
                <h2 style="color: #3E3767"><strong>Quais materiais posso solicitar?</strong></h2>
                <p style="color: #3E3767">
                    É possível solicitar materiais gerais de almoxarifado, como papel, canetas e lápis. Desde que o material esteja registrado no sistema.
                </p>

            </div>
        </div>
        <div class="col-sm">
            <h3 class="col-md-8 offset-md-3" style="margin-bottom: 5%; font-family: 'Segoe UI'; color: #3E3767; font"><u>Almoxarifado</u></h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group col-md-9">
                    <label for="email" class="control-label" style="font-family: 'Segoe UI'; color: #3E3767; font-weight: bold; font-size: 20px">E-mail</label>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" style="padding: 0; color: black; border-radius: 0; box-shadow: none; border: none; border-bottom: 1px solid" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-9">
                    <label for="password" class="control-label" style="font-family: 'Segoe UI'; color: #3E3767; font-weight: bold; font-size: 20px">Senha</label>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" style="padding: 0; color: black; border-radius: 0; box-shadow: none; border: none; border-bottom: 1px solid" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-control-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Lembrar usuário/e-mail e senha') }}
                    </label>
                </div>
                <br>
                <div class="form-group col-md-9">
                    <button type="submit" class="btn btn-block" style="background-color: #3E3767; color: white">
                        {{ __('Entrar') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                    <div class="form-group col-md-9">
                        <a class=" btn-link" href="{{ route('password.request') }}">Clique aqui</a>
                        <label>se você esqueceu a senha</label>
                        <hr style="margin-top: 0">
                    </div>
                @endif
            </form>
            <div class="col-sm">
                <label for="">Clique em cadastre-se para criar uma conta</label>
            </div>
            <div class="form-group col-md-9">
                <a type="button" href="{{ route('register') }}"class="btn btn-block" style="background-color: #3E3767; color: white">
                    {{ __('Cadastre-se') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
