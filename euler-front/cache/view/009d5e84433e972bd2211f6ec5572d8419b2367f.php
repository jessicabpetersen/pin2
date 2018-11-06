<?php $__env->startSection('title', 'Cadastro de Usuário'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row" id="nav-bar">
        <div class="col-12">
            <div class="row justify-content-between" style="height: 100%;">
                <div class="col-5 col-sm-3 col-lg-2 total-flex" style="justify-content: left;">
                    <h1>EULER</h1>
                </div>
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
                <form>
                    <fieldset>
                        <legend>Pessoal</legend>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" maxlength="50">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control cpf" id="cpf" name="cpf" maxlength="14">
                                <!--<input type="text" class="form-control cpf" id="cpf" name="cpf" maxlength="14" onkeyup="so_numero(this, /[^0-9-..]/)" onkeypress="mascara(this, '###.###.###-##')">-->
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rg">RG</label>
                                <input type="number" class="form-control" id="rg" name="rg" maxlength="7" onkeyup="so_numero(this, /[^0-9]/)">
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
                                <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="50">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control number" id="bairro" name="bairro" maxlength="8">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" maxlength="50">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control cep" id="cep" name="cep" maxlength="9">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" maxlength="50">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="uf">UF</label>
                                <input type="text" class="form-control uf" id="uf" name="uf" maxlength="2">
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
                                <input type="text" class="form-control telefone" id="telefone" name="telefone">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control celular" id="celular" name="celular">
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
                                <input type="text" class="form-control matricula" id="matricula" name="matricula" maxlength="10">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="/pin2-master/euler-front/public/JS/js_global.js" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>