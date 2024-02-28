<?php
include_once("../services/database/performQuery.php");

function getBlocos($projectInfo)
{
    $projetoArr = performQuery("selectBlocos", $projectInfo);
    if (is_null($projetoArr)) {
        $projetoQuery = performQuery("selectProjectByID", $projectInfo);
        $_SESSION['dashboardProjeto'] = array(
            'projetoID' => $projectInfo[1],
            'projetoNome' => $projetoQuery[0][2],
            'projetoDesc' => $projetoQuery[0][3],
            'Recurso Chave' => '',
            'Proposta de Valor' => '',
            'Segmento de clientes' => '',
            'Parceiros chave' => '',
            'Problemas' => '',
            'Solução' => '',
            'Relacionamento com cliente' => '',
            'Atividades Chave' => '',
            'Métricas chave' => '',
            'Canais de distribuição' => '',
            'Estrutura de custo' => '',
            'Vantagem competitiva' => '',
            'Fonte de receita' => '',

        );
        // print_r($_SESSION['dashboardProjeto']);
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