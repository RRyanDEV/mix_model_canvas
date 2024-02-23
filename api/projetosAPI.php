<?php

include("../controllers/projectController.php");

function formHandler($method, $args)
{
  switch ($method) {
    case "POST":
      if (isset($_POST['submit'])) {
        postProjeto(array($args));
      }
      break;
      case "GET":
        $_SESSION['projetos'] = getProjetos($args[0]);
        return $_SESSION['projetos'];
    default:
      header('Location: ./pages/errors/405.php', true, 301);
      exit();
  }
}

?>

<!-- . -->