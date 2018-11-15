<?php
require_once 'conectar.php';

$conexao = Conectar();

if(isset($_POST['req']) && $_POST['req'] == 'insertApolice') {

    $sql = "SELECT MAX(id_apolice) FROM apolice";

    $ret = pg_query($conexao, $sql);
    $iCodApol;

    while($row = pg_fetch_row($ret)) {
        $iCodApol = $row;
    }
    $iCodApol = $iCodApol[0] + 1;
    $iNumApoli   = $_POST['nApolice'];
    $sValor      = $_POST['valorApolice'];
    $sSeguradora = $_POST['seguradora'];

    $insertApoli = "INSERT INTO apolice (
                                id_apolice,
                                numero,
                                seguradora,
                                valor
                                ) VALUES (
                                {$iCodApol},
                                {$iNumApoli},
                                '{$sSeguradora}',
                                '{$sValor}' ); ";

    exec_sql($bErro, $insertApoli, $conexao);
    
    if(!$bErro) {
        $update = "UPDATE instituicao
                      SET id_apolice = {$iCodApol}";
        exec_sql($bErro, $update, $conexao);
        
        commit($conexao);
        $ret = 1;
    }
    else {
        rollback($conexao);
        $ret = 0;
    }
    echo $ret;
    exit;
}

if(isset($_POST['req']) && $_POST['req'] == 'updateOrientador') {

    $sNome      = $_POST['supervisor'];

    $update = "UPDATE instituicao
                  SET nome_supervisor = '{$sNome}' ";
                  
    exec_sql($bErro, $update, $conexao);

    if(!$bErro) {
        commit($conexao);
        $ret = 1;
    }
    else {
        rollback($conexao);
        $ret = 0;
    }
    echo $ret;
    exit;
}

if(isset($_POST['req']) && $_POST['req'] == 'insertArea') {

    $sNome      = $_POST['Area'];
    $sAtividade = $_POST['Atividade'];
    $iCurso     = $_POST['curso'];

    $insertArea = " INSERT INTO area (
                                nome,
                                atividade,
                                id_curso
                                ) VALUES (
                                '{$sNome}',
                                '{$sAtividade}',
                                {$iCurso} );";

    exec_sql($bErro, $insertArea, $conexao);

    if(!$bErro) {
        commit($conexao);
        $ret = 1;
    }
    else {
        rollback($conexao);
        $ret = 0;
    }
    echo $ret;
    exit;
}

if(isset($_POST['req']) && $_POST['req'] == 'selectEstagio') {
    
    $sql = "SELECT id_estagio,
              case when obrigatorio::integer = 1 then 'Obrigatório' else 'Não Obrigatório'
                   end as obrigatorio,
                   local_estagio as local,
                   supervisor,
                   nome_coordenador as coordenador,
                   ano,
                   semestre,
              case when finalizado = 1 then '<input type=\"checkbox\" disabled=\"true\" checked=\"true\" value=\"||id_estagio||\">'
                    else '<input type=\"checkbox\"  value=\"||id_estagio||\">'
                   end as finalizado
              FROM estagio";

    $ret = pg_query($conexao, $sql);
    $i = 0;
    $sHtml = '<table>';
    while($row = pg_fetch_row($ret)) {
        $sHtml .= '<tr>';
        $sHtml .= ' <td>';
        $sHtml .= "     $row[7]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[0]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[1]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[2]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[3]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[4]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[5]";
        $sHtml .= " </td>";
        $sHtml .= ' <td>';
        $sHtml .= "     $row[6]";
        $sHtml .= " </td>";
        $sHtml .= "</tr>";
    }
    $sHtml .= '</table>';
    echo $sHtml;
    exit;
}