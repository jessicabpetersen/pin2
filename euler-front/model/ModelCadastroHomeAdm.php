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
                       semestre
                  FROM estagio";

        $ret = pg_query($conexao, $sql);
       $i = 0;
       $sHtml = '<table>';
        while($row = pg_fetch_row($ret)) {
            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[0]";
            $sHtml .= " </td>";
//            $sHtml .= "</tr>";
//            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[1]";
            $sHtml .= " </td>";
//            $sHtml .= "</tr>";
//            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[2]";
            $sHtml .= " </td>";
//            $sHtml .= "</tr>";
//            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[3]";
            $sHtml .= " </td>";
//            $sHtml .= "</tr>";
//            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[4]";
            $sHtml .= " </td>";
//            $sHtml .= "</tr>";
//            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[5]";
            $sHtml .= " </td>";
//            $sHtml .= "</tr>";
//            $sHtml .= '<tr>';
            $sHtml .= ' <td>';
            $sHtml .= "     $row[6]";
            $sHtml .= " </td>";
            $sHtml .= "</tr>";
        }
        $sHtml .= '</table>';
        echo $sHtml;
    }
//}