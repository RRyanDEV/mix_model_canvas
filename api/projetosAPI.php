<?php

include("../controllers/projectController.php");
include_once("../controllers/exportController.php");

function projectHandler($method, $args)
{
  switch ($method) {
    case "POST":
      switch (true) {
        case (isset($_POST['submit'])):
          postProjeto([$_SESSION['userID'], $args[0], $args[1]]);
          break;
        case (isset($_POST['submitDel'])):
          deleteProjeto($args);
          break;
        case (isset($_POST['submitExport'])):
          getPDF($_POST);
        break;
      }
    break;
    case "GET":
      $_SESSION['projetos'] = getProjetos($args[0]);
      break;
    default:
      header('Location: ./pages/errors/405.php', true, 301);
      exit();
  }
}

?>

<!-- . -->