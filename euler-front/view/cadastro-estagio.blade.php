@extends('layout.app')
@section('title', 'Cadastro de Estágio')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row" id="nav-bar">
            <div class="col-12">
                <div class="row justify-content-between" style="height: 100%;">
                    <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                        <h1>EULER</h1>
                    </div>
                    <h6>Estágios Universitários Lavratura e Emissão de Relatórios</h6>
                    <div class="col-4 col-sm-3 col-md-2 total-flex">
                        <a href="home">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro de Estágio</h2>
                <form method="post" action="/pin2-master/euler-front/model/ModelCadastroEstagio.php">
                    <fieldset>
                        <legend>Estágio</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="obrigatorio" id="check-obrigatorio" name="tipo[]" onclick="desabilitapolice()">
                                    <label class="form-check-label" for="check-obrigatorio">
                                        Obrigatório
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="nao-obrigatorio" id="check-nao-obrigatorio" name="tipo[]" onclick="habilitapolice()">
                                    <label class="form-check-label" for="check-nao-obrigatorio">
                                        Não obrigatório
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-7 col-md-2">
                                <label for="ano">Ano</label>
                                <input type="text" class="form-control ano" id="ano" name="ano" required>
                            </div>
                            <div class="form-group col-5 col-md-2 col-lg-1">
                                <label for="semestre">Semestre</label>
                                <select name="semestre" id="semestre" class="campo_select" required>
                                    <option value="1">Primeiro</option>
                                    <option value="2">Segundo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="curso">Curso</label>
                                <select class="campo_select" id="curso" >
                                    <option value=0>Selecione</option>
                                    @foreach($cursos as $curso)
                                    <option value={{$curso['id']}}>{{$curso['nome']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-5 col-md-2 col-lg-1">
                                <label for="area">Área</label>
                                <select class="campo_select" id="area">
                                    <option value='0'>Selecione</option>
                                    @foreach($areas as $area)
                                    <option value={{$area['id']}}>{{$area['nome']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                            <legend>Concedente</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="local">Local</label>
                                <input type="text" class="form-control" id="local" name="local" maxlength="50" required>
                            </div>
                        </div>
                        <div>
                            <div class="form-row" id='tobecloned'>
                                <div class="form-group col-md-3 col-lg-1">
                                    <label for="turno">Turno</label>
                                    <select name="turno[]" id="turno_" class="campo_select" required>
                                        <option value="1">Matutino</option>
                                        <option value="2">Vespertimo</option>
                                        <option value="3">Noturno</option>
                                    </select>
                                </div>
                            <div class="form-group col-6 col-md-2">
                                    <label for="horario-inicial">Início</label>
                                    <input style="margin-left: 20px;" type="time" class="form-control" id="horario-inicial" name="horario-inicial[]" required>
                                </div>
                            <div class="form-group col-6 col-md-2">
                                    <label for="horario-final">Término</label>
                                    <input style="margin-left: 20px;" type="time" class="form-control" id="horario-final" name="horario-final[]" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="supervisor">Supervisor</label>
                                <input type="text" class="form-control" id="supervisor" name="supervisor" required>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="cargo-supervisor">Cargo</label>
                                <input type="text" class="form-control" id="cargo-supervisor" name="cargo-supervisor" maxlength="50" required>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Descritivo</legend>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="objetivos">Objetivos</label>
                                <input type="text" class="form-control" id="objetivos" name="objetivos"  required>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="atividades">Atividades</label>
                                <input type="text" class="form-control" id="atividades" name="atividades" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" maxlength="50" required>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Apólice</legend>
                        <div class="form-row">
                            <div class="form-group col-6 col-md-3">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control number" id="numero" name="numero" required>
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="valor">Valor</label>
                                <input type="text" class="form-control money" id="valor" name="valor" maxlength="50" required>
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="seguradora">Seguradora</label>
                                <input type="text" class="form-control money" id="seguradora" name="seguradora" maxlength="50" required>
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="emBranco"></label>
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="valor-bolsa">Valor da bolsa</label>
                                <input type="text" class="form-control money" id="valor-bolsa" name="valor-bolsa" maxlength="50" required>
                            </div>
                            <div class="form-group col-6 col-md-3">
                                <label for="vale-transporte">Vale transporte</label>
                                <input type="text" class="form-control money" id="vale-transporte" name="vale-transporte" maxlength="50" required>
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
<script src="/pin2-master/euler-front/public/JS/js_cadastro_estagio.js" type="text/javascript"></script>
@endsection
