<?php

require_once('ModelBusca.php');

class ModelArquivo
{
    function grava($urlfile, $file, $outp_file)
    {
        chdir($urlfile);
        file_put_contents($outp_file, edita(file_get_contents($file)));

    }
}
     function edita($texto)
    {

        $dados = ModelBusca::buscar();

        $texto = str_replace("obrigatório/nao obrigatório", $dados['obrigatorio'], $texto);
        $texto = str_replace("nome Academico", $dados['nome_academico'], $texto);
        $texto = str_replace("data n Academico", $dados['datanascimento'], $texto);
        $texto = str_replace("rua Academico", $dados['rua_aluno'], $texto);
        $texto = str_replace("bairro Academico", $dados['bairro_aluno'], $texto);
        $texto = str_replace("cidade Academico",$dados['cidade_aluno'], $texto);
        $texto = str_replace("cep Academico", $dados['cep_aluno'], $texto);
        $texto = str_replace("cpf Academico", $dados['cpf_aluno'], $texto);
        $texto = str_replace("rg Academico", $dados['rg_aluno'], $texto);
        $texto = str_replace("email Academico", $dados['email_aluno'], $texto);
        $texto = str_replace("cel Academico", $dados['celular_aluno'], $texto);
        $texto = str_replace("fixo Academico", $dados['fixo_aluno'], $texto);
        $texto = str_replace("curso Academico", $dados['curso_academico'], $texto);
        $texto = str_replace("ano Academico", $dados['ano_estagio'], $texto);
        $texto = str_replace("sem Academico", $dados['semestre_estagio'], $texto);
        $texto = str_replace("matricula Academico", $dados['matricula_aluno'], $texto);
        $texto = str_replace("orientador Academico", $dados['nome_orientador'], $texto);
        $texto = str_replace("apolice Academico", $dados['apolice_aluno'], $texto);
        $texto = str_replace("seguradora Academico", $dados['segurado_aluno'], $texto);
        $texto = str_replace("nome Coordenador", $dados['nome_coordenador'], $texto);
        $texto = str_replace("matricula Coordenador", $dados['matricula_orientador'], $texto);
        $texto = str_replace("cpf Coordenador", $dados['cpf_coordenador'], $texto);
        $texto = str_replace("rg Coordenador", $dados['rg_coordenador'], $texto);
        $texto = str_replace("razao social Consedente", $dados['nome_concedete'], $texto);
        $texto = str_replace("endereco Consedente", $dados['rua_concedente'], $texto);
        $texto = str_replace("cidade Consedente", $dados['cidade_concedente'], $texto);
        $texto = str_replace("cep Consedente", $dados['cep_concedente'], $texto);
        $texto = str_replace("uf Consedente", $dados['uf_concedente'], $texto);
        $texto = str_replace("cnpj Consedente", $dados['cnpj_concedente'], $texto);
        $texto = str_replace("fone Consedente", $dados['telefone_concedente'], $texto);
        $texto = str_replace("email Consedente", $dados['email_concedente'], $texto);
        $texto = str_replace("nome r l  Consedente", $dados['representante_concedente'], $texto);
        $texto = str_replace("cargo r l Consedente", $dados['cargo_representante_concedente'], $texto);
        $texto = str_replace("local estagio", $dados['local_estagio'], $texto);
        $texto = str_replace("nome s estagio", $dados['nome_supervisor'], $texto);
        $texto = str_replace("cargo s estagio", $dados['cargo_supervisor_estagio'], $texto);
        $texto = str_replace("valor da bolsa", str_replace('R','',$dados['valor_bolsa_estagio']), $texto);
        $texto = str_replace("valor do vale trasporte",str_replace('R','', $dados['valor_vale_estagio']), $texto);


        return $texto;

    }
