<?php

include("../controllers/projectController.php");

function projectHandler($method, $args)
{
  switch ($method) {
    case "POST":
      if (isset($_POST['submit'])) {
        postProjeto([$_SESSION['userID'], $args[0], $args[1]]);
      } if (isset($_POST['submitDel'])) {
        deleteProjeto($args);
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