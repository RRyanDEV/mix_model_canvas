<?php
include_once("../services/database/performQuery.php");

function getPDF($args)
{
    $userID = $_SESSION['userID'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $dt = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
    $dateExport = $dt->format("d-m-Y, H:i:s");
    $arrQuery = [];
    if (count($args) == 1) {
        $projetoArr = performQuery("selectBlocosByProjectID", [$userID, $args[0]]);
        if (is_null($projetoArr)) {
            header('Location: ../../../pages/errors/formEmpty.php', true, 301);
            exit();
        } else {
            foreach ($args as $key1 => $item) {
                $arrQuery = array(
                    $key1 => array(
                        'projetoNome' => $projetoArr[$key1][2],
                        'projetoDesc' => $projetoArr[$key1][3],
                        )
                    );
                    foreach ($projetoArr as $key => $projeto) {
                        $arrQuery[$key1] += [$projeto[5] => $projeto[6]];
                    }
                }
            }
            $_SESSION['exportPDF'] = array(
                'returnToDashboard' => 'true',
                'username' => $username,
                'email' => $email,
                'date' => $dateExport,
                ...$arrQuery
            );
        } else {
            $queryParams = array(
                0 => $userID
            );
            $numProjetos = 0;
            foreach ($args as $key => $item) {
                if (is_numeric($key)) {
                    $numProjetos += 1;
                    array_push($queryParams, $key);
                }
            }
            $projetoArr = performQuery("selectBlocosByProjectID", $queryParams);
            if (is_null($projetoArr)) {
                header('Location: ../../../pages/errors/formEmpty.php', true, 301);
                exit();
        } else {
            for ($i = 0; $i <= $numProjetos - 1; $i++) {
                $max = (13 * ($i + 1)) - 1;
                $min = $max - 12;
                array_push($arrQuery, array(
                    'projetoNome' => $projetoArr[$max][2],
                    'projetoDesc' => $projetoArr[$max][3]
                ));
                foreach ($projetoArr as $key => $projeto) {
                    if ($key >= $min && $key < $max + 1) {
                        $arrQuery[$i][$projeto[5]] = $projeto[6]; 
                    }
                }
            }
        }
        $_SESSION['exportPDF'] = array(
            'username' => $username,
            'email' => $email,
            'date' => $dateExport,
            ...$arrQuery
        );
        header('Location: ../../../pages/exportPdf.php');
        exit();
    }
}


?>

<!-- . -->