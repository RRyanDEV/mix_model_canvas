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
        header("Location: dashboard.php");
    } else if ($resultHashed) {
        $_SESSION['username'] = $resultHashed;
        header("Location: dashboard.php");
    } else {
        header("Location: error.php");
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
    $create_datetime = date("Y-m-d H:i:s");
    $result = performQuery('insertUser', [$username, $password, $email, $create_datetime]);
    if ($result) {
        header("Location: success.php");
    } else {
        header("Location: failure.php");
    }
    exit();
}
