<?php
require_once 'conectar.php';

//class homeAdm {
//
//    public function insertApolice() {
//        $conexao = Conectar();
//        
//        $iNumApoli   = $_POST['nApolice'];
//        $sValor      = $_POST['valorApolice'];
//        $sSeguradora = $_POST['seguradora'];
//
//        $insertApoli = "INSERT INTO apolice (
//                                    numero,
//                                    seguradora,
//                                    valor
//                                    ) VALUES (
//                                    {$iNumApoli},
//                                    '{$sSeguradora}',
//                                    '{$sValor}' ); ";
//
//        exec_sql($bErro, $insertApoli, $conexao);
//        echo $insertApoli;
//        if(!$bErro) {
//            commit($conexao);
//        }
//        else {
//            rollback($conexao);
//        }
//    }
//
//    public function insertArea() {
//        $conexao = Conectar();
//        
//        $sNome      = $_POST['Area'];
//        $sAtividade = $_POST['Atividade'];
//        $iCurso     = $_POST['curso'];
//
//        $insertArea = " INSERT INTO area (
//                                    nome,
//                                    atividade,
//                                    id_curso
//                                    ) VALUES (
//                                    '{$sNome}',
//                                    '{$sAtividade}',
//                                    {$iCurso} );";
//                            
//        exec_sql($bErro, $insertArea, $conexao);
//        
//        if(!$bErro) {
//            commit($conexao);
//        }
//        else {
//            rollback($conexao);
//        }
//    }

    if(isset($_POST['req']) && $_POST['req'] == 'selectEstagio') {
        $conexao = Conectar();
        
        $sql = "SELECT id_estagio,
                  case when obrigatorio::integer = 1 then 'Obrigatório' else 'Não Obrigatório'
                       end as obrigatorio,
                       local_estagio as local,
                       supervisor,
                       nome_coordenador as coordenador,
                       ano,
                       semestre,
<<<<<<< HEAD
                  case when finalizado = 1 then '<input type=\"checkbox\" id=\"finalizado\" disabled checked=\"true\" value=\"'||id_estagio||'\">'
			else '<input type=\"checkbox\" id=\"finalizado\" value=\"'||id_estagio||'\">'
=======
                  case when finalizado = 1 then '<input type=\"checkbox\" checked=\"true\" value=\"||id_estagio||\">'
			else '<input type=\"checkbox\"  value=\"||id_estagio||\">'
>>>>>>> 7b09908c9b18198e127b6aac769a065528c2c356
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
    }
    
    if(isset($_POST['req']) && $_POST['req'] == 'finalizados') {
        $conexao = Conectar();
        $SQL = "UPDATE estagio
                   SET finalizado = 1
                 WHERE id_estagio = $1";
        foreach($_POST["linhas"] as $linha) {
            $oQuery = pg_query_params($conexao, $SQL, [$linha]);
            pg_exec($conexao, $oQuery);
        }
    }
//}