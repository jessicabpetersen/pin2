@extends('layout.app')
@section('title', 'Cadastro de Usuário')

@section('content')
<div class="container-fluid">
    <div class="row" id="nav-bar">
        <div class="col-12">
            <div class="row justify-content-between" style="height: 100%;">
                <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                    <h1>EULER</h1>
                </div>
                <div class="col-4 col-sm-3 col-md-2 total-flex">
                    <a href="/login">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro de Usuário</h2>
                <form>
                    <fieldset>
                        <legend>Pessoal</legend>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="data-nascimento">Data de nascimento</label>
                                <input type="date" class="form-control" id="data-nascimento" name="data-nascimento">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="uf">UF</label>
                                <input type="text" class="form-control" id="uf" name="uf">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contato</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Curso</legend>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="curso">Curso</label>
                                <select name="curso" id="curso">
                                    <option value="eso">ESO - Engenharia de Software</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="matricula">Matrícula</label>
                                <input type="text" class="form-control" id="matricula" name="matricula">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection