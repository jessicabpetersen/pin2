@extends('layout.app')
@section('title', 'Login')

@section('content')
<div class="container-fluid" style="height: 100vh;">
    <div class="row" id="nav-bar">
        <div class="col-12">
            <div class="row justify-content-between" style="height: 100%;">
                <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                    <h1>EULER</h1>
                </div>
                <div class="col-4 col-sm-3 col-md-2 total-flex">
                    <a href="/cadastro-usuario">Cadastre-se</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row altura-100 total-flex">
        <div class="col-10 col-sm-6 col-md-4 col-xl-3">
            <form>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" aria-describedby="Login" placeholder="">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
                <a href="/recuperar-senha">Recuperar senha</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection