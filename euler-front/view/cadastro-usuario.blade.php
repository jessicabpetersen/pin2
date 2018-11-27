@extends('layout.app')
@section('title', 'Cadastro de Usuário')

@section('content')
  <div class="row" id="nav-bar">
        <div class="col-12">
            <div class="row justify-content-between" style="height: 100%;">
                <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                    <h1>EULER</h1>
                </div>
                <h6>Estágios Universitários Lavratura e Emissão de Relatórios</h6>
                <div class="col-4 col-sm-3 col-md-2 total-flex">
                    <a href="login">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro de Usuário</h2>
				
				<?php
                    if(isset($_GET['erro']) and $_GET['erro'] == 1){
                        $html = '<div class="alert alert-danger" role="alert">';
                        $html .= 'Senha de administrador incorreta!';
                        $html .= '</div>';
                        echo $html;
                    }
                ?>
				
                <form method="post" action="/pin2-master/euler-front/model/ModelCadastroUsuario.php">
                    <fieldset>
                        <legend>Pessoal</legend>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control cpf" id="cpf" name="cpf" maxlength="14" onchange="if(this.value.length == 14) { provarProFarahQueEuSeiUsarMetodo('chupa faráh') } else { alert(this.value.length); }" placeholder="xxx.xxx.xxx-xx" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control rg" id="rg" name="rg" maxlength="7" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="data_nascimento">Data de nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="matricula">Matricula</label>
                                <input type="text" class="form-control matricula" id="matricula" name="matricula" maxlength="10" required>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="50" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control number" id="numero" name="numero" maxlength="8" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" maxlength="50" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" placeholder="xxxxx-xxx" class="form-control cep" id="cep" name="cep" maxlength="9" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" maxlength="50" required>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="uf">UF</label>
                                <select name="uf" id="uf" class="campo_select" required>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AM">AM</option>
                                    <option value="AP">AP</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contato</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="(xx) xxxx-xxxx" onkeyup="validaEmail(this.value);">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control celular" id="celular" name="celular" placeholder="(xx) xxxxx-xxxx">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Senha</legend>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" maxlength="10" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="conf_senha">Confirmar Senha</label>
                                <input type="password" class="form-control" id="conf_senha" name="conf_senha" maxlength="10" required>
                            </div>
                        </div>
                    </fieldset>
					<fieldset>
                        <div class="form-row">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="perfil-administrador" name="perfil-administrador">
                                <label for="perfil-administrador">Perfil Administrador</label>
                            </div>
                        </div>
                        <div class="form-row" id="box-senha-administrador" style="display: none;">
                            <div class="form-group col-md-3">
                                <label for="senha-administrador">Senha Administrador</label>
                                <input type="password" class="form-control" id="senha-administrador" name="senha-administrador" maxlength="10">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onclick="validaSenha()">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/pin2-master/euler-front/public/JS/js_cadastro_usuario.js" type="text/javascript"></script>
@endsection