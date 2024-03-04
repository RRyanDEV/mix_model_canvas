<?php
function authLogin()
{
    $email = stripslashes($_REQUEST['email']);
    $email = performQuery('string', [$email]);
    $_SESSION['email'] = $email;
    $password = stripslashes($_REQUEST['password']);
    $result = checkCredentials(false, $email, $password);
    $resultHashed = checkCredentials(true, $email, $password);
    if ($result) {
        $_SESSION['username'] = $result;
        header("Location: projetos.php");
    } else if ($resultHashed) {
        $_SESSION['username'] = $resultHashed;
        header("Location: projetos.php");
    } else {
        header("Location: ./errors/error.php");
    }
    exit();
}

function authCheckLogin()
{
    if (!isset($_SESSION['username'])) {
        header('Location: login.php', true, 301);
        exit();
    }
}

function authCreateUser()
{
    $username = stripslashes($_REQUEST['username']);
    $username = performQuery('string', [$username]);
    $email    = stripslashes($_REQUEST['email']);
    $email    = performQuery('string', [$email]);
    $password = stripslashes($_REQUEST['password']);
    $password = performQuery('string', [$password]);
    $dt = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
    $create_datetime = $dt -> format("d-m-Y, H:i:s");
    $result = performQuery('insertUser', [$username, $password, $email, $create_datetime]);
    if ($result) {
        header("Location: success.php");
    } else {
        header("Location: failure.php");
    }
    exit();
}
?>

<!-- . -->