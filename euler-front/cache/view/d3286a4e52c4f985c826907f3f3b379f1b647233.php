<?php $__env->startSection('title', 'Cadastro de Concedente'); ?>

<?php $__env->startSection('content'); ?>
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
                <h2>Cadastro de Concedente</h2>
                <form>
                    <fieldset>
                        <legend>Informações da Instituição</legend>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="razao">Razão Social</label>
                                <input type="text" class="form-control" id="razao" name="razao">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj">
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
                            <div class="form-group col-md-9">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Estágio</legend>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="representante">Representante</label>
                                <input type="text" class="form-control" id="representante" name="representante">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="cargo-representante">Cargo</label>
                                <input type="text" class="form-control" id="cargo-representante" name="cargo-representante">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="supervisor">Supervisor</label>
                                <input type="text" class="form-control" id="supervisor" name="supervisor">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="cargo-supervisor">Cargo</label>
                                <input type="text" class="form-control" id="cargo-supervisor" name="cargo-supervisor">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="local">Local</label>
                                <input type="text" class="form-control" id="local" name="local">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>