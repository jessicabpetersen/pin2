<?php
//if (isset($_POST['req']) && $_POST['req'] == 'preencheCampos')
class ModelBusca {
    function buscar()  {
        if (!isset($_SESSION)) {
            session_start();
        }
        require_once 'conectar.php';
        $conexao = Conectar();

           $sql = " SELECT  
                    case when obrigatorio::integer = 1 then 'Obrigatório' else 'Não Obrigatório'
                  end as obrigatorio,
                aluno.nome as nome_academico,
		aluno.datanascimento,
		end_aluno.logradouro as rua_aluno,
		end_aluno.bairro as bairro_aluno,
        end_aluno.cidade as cidade_aluno,
		end_aluno.cep as cep_aluno,
		aluno.cpf as cpf_aluno,
		aluno.rg as rg_aluno,
		aluno.email as email_aluno,
		aluno.celular as celular_aluno,
		aluno.telefone as fixo_aluno,
		curso.nome as curso_academico,
		estagio.ano as ano_estagio,
		estagio.semestre as semestre_estagio,
		aluno.matricula as matricula_aluno,
		apolice.valor as apolice_aluno,
		apolice.seguradora as segurado_aluno,
		estagio.nome_coordenador as nome_orientador,
		coordenador.nome as nome_coordenador,
		coordenador.matricula as matricula_orientador,
		coordenador.rg as rg_coordenador,
		coordenador.cpf as cpf_coordenador,
		concedente.razao_social as nome_concedete,
		end_concedente.logradouro as rua_concedente,
		end_concedente.cidade as cidade_concedente,
		end_concedente.cep as cep_concedente,
		end_concedente.uf as uf_concedente,
		concedente.cnpj as cnpj_concedente,
		concedente.telefone as telefone_concedente,
		concedente.email as email_concedente,
		concedente.nome_representante as representante_concedente,
		concedente.cargo_representante as cargo_representante_concedente,
		estagio.local_estagio as local_estagio,
		estagio.supervisor as nome_supervisor,
		estagio.cargo_supervisor as cargo_supervisor_estagio,
		estagio.valor_bolsa as valor_bolsa_estagio,
		estagio.valor_vale as valor_vale_estagio
		
            FROM estagio 
		JOIN pessoa AS aluno ON (estagio.id_aluno = aluno.id_pessoa And estagio.finalizado = 0)
		JOIN apolice ON (estagio.id_apolice = apolice.id_apolice)
		JOIN endereco AS end_aluno ON (end_aluno.id_endereco = aluno.id_endereco)
		JOIN concedente ON (concedente.id_concedente = estagio.id_concedente)
		JOIN endereco AS end_concedente ON (end_concedente.id_endereco = concedente.id_endereco)
		JOIN instituicao ON (instituicao.id_instituicao = estagio.id_instituicao)
		JOIN curso ON (estagio.id_curso = curso.id_curso)
		JOIN pessoa AS coordenador ON (coordenador.id_pessoa = instituicao.id_coordenador)

            where aluno.id_pessoa = {$_SESSION['codusuario']} ";

        $ret = pg_query($conexao, $sql);
        $aInfos = null;

        while ($row = pg_fetch_row($ret)) {
            $aInfos['teste'] = 'testando';
            $aInfos['obrigatorio'] = $row[0];
            $aInfos['nome_academico'] = $row[1];
            $aInfos['datanascimento'] = $row[2];
            $aInfos['rua_aluno'] = $row[3];
            $aInfos['bairro_aluno'] = $row[4];
            $aInfos['cidade_aluno'] = $row[5];
            $aInfos['cep_aluno'] = $row[6];
            $aInfos['cpf_aluno'] = $row[7];
            $aInfos['rg_aluno'] = $row[8];
            $aInfos['email_aluno'] = $row[9];
            $aInfos['celular_aluno'] = $row[10];
            $aInfos['fixo_aluno'] = $row[11];
            $aInfos['curso_academico'] = $row[12];
            $aInfos['ano_estagio'] = $row[13];
            $aInfos['semestre_estagio'] = $row[14];
            $aInfos['matricula_aluno'] = $row[15];
            $aInfos['apolice_aluno'] = $row[16];
            $aInfos['segurado_aluno'] = $row[17];
            $aInfos['nome_orientador'] = $row[18];
            $aInfos['nome_coordenador'] = $row[19];
            $aInfos['matricula_orientador'] = $row[20];
            $aInfos['rg_coordenador'] = $row[21];
            $aInfos['cpf_coordenador'] = $row[22];
            $aInfos['nome_concedete'] = $row[23];
            $aInfos['rua_concedente'] = $row[24];
            $aInfos['cidade_concedente'] = $row[25];
            $aInfos['cep_concedente'] = $row[26];
            $aInfos['uf_concedente'] = $row[27];
            $aInfos['cnpj_concedente'] = $row[28];
            $aInfos['telefone_concedente'] = $row[29];
            $aInfos['email_concedente'] = $row[30];
            $aInfos['representante_concedente'] = $row[31];
            $aInfos['cargo_representante_concedente'] = $row[32];
            $aInfos['local_estagio'] = $row[33];
            $aInfos['nome_supervisor'] = $row[34];
            $aInfos['cargo_supervisor_estagio'] = $row[35];
            $aInfos['valor_bolsa_estagio'] = $row[36];
            $aInfos['valor_vale_estagio'] = $row[37];
        }
        return ($aInfos);

    }
}