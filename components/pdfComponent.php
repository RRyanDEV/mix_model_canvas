<?php
include_once("../utils/utils.php");

$utils = new Utils();
global $utils;

function createPdfComponent()
{
    $formarray = "";
    $ignore = [
        "email",
        "userID",
        "username",
        "step",
        "textValue",
    ];
    foreach ($_SESSION as $key => $item) {
        $ignored = $GLOBALS['utils']->valueIsIgnored($key, $ignore);
        if (!($ignored)) {
            $resposta = $item;
            $formarray =  $formarray . '<tr class="label"><td class="label">' . $key . '</td><td>' . $resposta . '</td></tr>';
        }
    };
    $heading = '<div class="endparent">
    <div class="headerPdf">
            <div class="title">
            <h2>Nome do Aluno: ' . '<h3>' . $_SESSION['username'] . '<h3>' . '</h2> ' . '
            </div>
            <div class="subtitle">
            <h2>Email do Aluno: ' . '<h3>' . $_SESSION['email'] . '<h3>' . '</h2>' . '
            </div>
        </div>';
    $component = '<div class="TitleEnd">
    </a><form method="post">
    </form></div>' . '<div class="tables"><div class="tbl"><table class="demo"><tbody>' . $formarray . '</tbody></table><div id="no-print" class="buttons">
    <div id="imprimirBtn" class="pdfButton">
                    <p><a href="">Imprimir</a></p>
                </div>
                <div class="pdfButton">
                    <p><a href="./dashboard.php">Voltar</a></p>
                </div>
                </div></div></div></div>';
    return $heading . $component;
}
?>

<!-- . -->