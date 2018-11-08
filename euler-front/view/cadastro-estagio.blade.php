@extends('layout.app')
@section('title', 'Cadastro de Estágio')

@section('content')
<div class="container-fluid">
    <div class="row" id="nav-bar">
        <div class="col-12">
            <div class="row justify-content-between" style="height: 100%;">
                <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                    <h1>EULER</h1>
                </div>
                <div class="col-4 col-sm-3 col-md-2 total-flex">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro de Estágio</h2>
                <form>
                    <fieldset>
                        <legend>Estágio</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="obrigatorio" id="check-obrigatorio" name="tipo[]">
                                    <label class="form-check-label" for="check-obrigatorio">
                                        Obrigatório
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="nao-obrigatorio" id="check-nao-obrigatorio" name="tipo[]">
                                    <label class="form-check-label" for="check-nao-obrigatorio">
                                        Não obrigatório
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-7 col-md-2">
                                <label for="ano">Ano</label>
                                <input type="text" class="form-control ano" id="ano" name="ano">
                            </div>
                            <div class="form-group col-5 col-md-2 col-lg-1">
                                <label for="semestre">Semestre</label>
                                <select name="semestre" id="semestre">
                                    <option value="1">Primeiro</option>
                                    <option value="2">Segundo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8 col-lg-9">
                                <label for="area">Área</label>
                                <input type="text" class="form-control" id="area" name="area" maxlength="50">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Concedente</legend>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="local">Local</label>
                                <input type="text" class="form-control" id="local" name="local" maxlength="50">
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <label for="horario-inicial">Início</label>
                                <input type="time" class="form-control" id="horario-inicial" name="horario-inicial">
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <label for="horario-final">Término</label>
                                <input type="time" class="form-control" id="horario-final" name="horario-final">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="supervisor">Supervisor</label>
                                <input type="text" class="form-control" id="supervisor" name="supervisor">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="cargo-supervisor">Cargo</label>
                                <input type="text" class="form-control" id="cargo-supervisor" name="cargo-supervisor" maxlength="50">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Descritivo</legend>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="objetivos">Objetivos</label>
                                <input type="text" class="form-control" id="objetivos" name="objetivos" maxlength="50">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="atividades">Atividades</label>
                                <input type="text" class="form-control" id="atividades" name="atividades" maxlength="50">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" maxlength="50">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Apólice</legend>
                        <div class="form-row">
                            <div class="form-group col-6 col-md-3">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control number" id="numero" name="numero">
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="valor">Valor</label>
                                <input type="text" class="form-control money" id="valor" name="valor" maxlength="50">
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="valor-bolsa">Valor da bolsa</label>
                                <input type="text" class="form-control money" id="valor-bolsa" name="valor-bolsa" maxlength="50">
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="vale-transporte">Vale transporte</label>
                                <input type="text" class="form-control money" id="vale-transporte" name="vale-transporte" maxlength="50">
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