<?php
include_once("../services/database/performQuery.php");

function getBlocos($projectInfo)
{
    $projetoArr = performQuery("selectBlocosByProjectID", $projectInfo);
    if (is_null($projetoArr)) {
        $projetoQuery = performQuery("selectProjectByID", $projectInfo);
        $_SESSION['dashboardProjeto'] = array(
            'projetoID' => $projectInfo[1],
            'projetoNome' => $projetoQuery[0][2],
            'projetoDesc' => $projetoQuery[0][3],
            'Recurso Chave' => ' ',
            'Proposta de Valor' => ' ',
            'Segmento de clientes' => ' ',
            'Parceiros chave' => ' ',
            'Problemas' => ' ',
            'Solução' => ' ',
            'Relacionamento com cliente' => ' ',
            'Atividades Chave' => ' ',
            'Métricas chave' => ' ',
            'Canais de distribuição' => ' ',
            'Estrutura de custo' => ' ',
            'Vantagem competitiva' => ' ',
            'Fonte de receita' => ' ',
        );
        foreach ($_SESSION['dashboardProjeto'] as $key => $projeto) {
            if (strcmp($key, 'projetoID') !== 0 && strcmp($key, 'projetoNome') !== 0 && strcmp($key, 'projetoDesc') !== 0) {
                performQuery("insert", [$_SESSION['dashboardProjeto']['projetoID'],$_SESSION['userID'],$key, $projeto]);
            }
        }
    } else {
        $_SESSION['dashboardProjeto'] = array(
            'projetoID' => $projetoArr[0][1],
            'projetoNome' => $projetoArr[0][2],
            'projetoDesc' => $projetoArr[0][3],
        );
        foreach ($projetoArr as $key => $projeto) {
            $_SESSION['dashboardProjeto'][$projeto[5]] = $projeto[6];
        }
    }
}
?>
<!-- . -->