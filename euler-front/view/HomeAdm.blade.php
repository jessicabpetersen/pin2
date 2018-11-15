@extends('layout.app')
@section('title', 'Home Administrador')

@section('content')
<div class="container-fluid">
    <div class="row" id="nav-bar">
        <div class="col-12">
            <div class="row justify-content-between" style="height: 100%;">
                <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                    <h1>EULER</h1>
                </div>
                <h6>Estágios Universitários Lavratura e Emissão de Relatórios</h6>
            </div>
        </div>
        <nav id="menu">
            <ul class="dropdrown">
                <li><a style="color: white">Cadastros</a>
                    <ul>
                        <li><a onclick="Mudarestado('divCadastroApolice')">Apolice de Seguro</a></li>
                        <li><a onclick="Mudarestado('divCadastroArea')">Area de Estagio</a></li>
                        <li><a onclick="Mudarestado('divCadastroOrientador')">Professor Orientador</a></li>
                        <li><a href="cadastro-coordenador">Coordenador Geral</a></li>
                    </ul>
                </li>
                <li><a href="#">Impressões</a>
                    <ul>
                        <li><a>Documento 1</a></li>
                        <li><a>Documento 2</a></li>
                        <li><a>Documento 3</a></li>
                    </ul>
                </li>
            </ul>
        </nav>    
    </div>
    
    <div class="container" id="home">
        <div class="row">
            <div class="col">
                <fieldset>
                    <div id="divCadastroApolice" style="display: none">
                            <input type="hidden" name='method' value='insertApolice'>
                            <fieldset>
                                <legend>Cadastro Apólice</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="numeroApolice">Nº Apólice</label>
                                        <input type="text" class="form-control rg" id="nApolice" name="nApolice" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="valor">Valor</label>
                                        <input type="text" class="form-control money" id="valorApolice" name="valorApolice">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="seguradora">Seguradora</label>
                                        <input type="text" class="form-control seguradora" id="seguradora" name="seguradora">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <button id="buttonCadastrarApolice" type="submit" class="btn btn-primary" onclick="salvarApoplice()">Salvar</button>
                                    <button id="buttonCadastrarApolice" style="margin-left: 5px" onclick="Mudarestado('divCadastroApolice')" class="btn btn-primary">Cancelar</button>
                                </div>
                            </fieldset>
                    </div>
                </fieldset>
                <div id="divCadastroArea" style="display: none">
                    <fieldset>
                        <legend>Cadastro Area</legend>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="Curso">Curso</label>
                                <select class="campo_select" id="curso">
                                    <option value='0'>Selecione</option>
                                    @foreach($cursos as $curso)
                                    <option value={{$curso['id']}}>{{$curso['nome']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Area">Area</label>
                                <input type="text" class="form-control" id="Area" name="Area">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Atividade">Atividade</label>
                                <textarea type="text" class="form-control seguradora" id="Atividade" name="Atividade"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button id="buttonCadastrarArea" type="submit" onclick="salvarArea()" class="btn btn-primary">Salvar</button>
                            <button id="buttonCadastrarArea" style="margin-left: 5px" onclick="Mudarestado('divCadastroArea')" class="btn btn-primary">Cancelar</button>
                        </div>
                    </fieldset>
                </div>
                <div style="display: none" id="divCadastroOrientador">
                    <fieldset>
                        <legend>Cadastro Orientador</legend>
                        <div class="form-group">
                            <label for="nomeOrientador">Professor Orientador</label>
                            <input type="text" class="form-control" id="professorOrientador" name="Professor Orientador" required>
                        </div>
                        <div class="form-row">
                            <button id="buttonCadastrarOrientador" type="submit" onclick="salvarOrientador()" class="btn btn-primary">Salvar</button>
                            <button id="buttonCadastrarOrientador" style="margin-left: 5px" onclick="Mudarestado('divCadastroOrientador')" class="btn btn-primary">Cancelar</button>
                        </div>
                    </fieldset>
                </div>
                <div id="gridAdm" style="display: block;">
                    <fieldset>
                        <legend>Estágios Cadastrados</legend>
                        <div class="center">
                            <table>
                                <tr>
                                    <th width='10%'>Finalizado</th>
                                    <th width='9%'>Código</th>
                                    <th width='15%'>Tipo</th>
                                    <th width='15%'>Local</th>
                                    <th width='20%'>Supervissor</th>
                                    <th width='20%'>Coordenador</th>
                                    <th width='15%'>Ano</th>
                                    <th width='15%'>Semestre</th>
                                </tr>
                                <tbody id='teste'></tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <link href="/pin2-master/euler-front/public/css/grid.css" rel="stylesheet" type="text/css"/>
    <script src="/pin2-master/euler-front/public/JS/js_homeAdm.js" type="text/javascript"></script>
@endsection