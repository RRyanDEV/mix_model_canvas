<?php

class Utils
{
    public function initialize($variable)
    {
        $_SESSION['step'] = $_GET['step'];
        if (!isset($_SESSION['textValue'])) {
            $_SESSION['textValue'] = "";
        }
        if (!isset($_SESSION['step'])) {
            $_SESSION['step'] = 0;
        }
        if (!isset($_GET['step'])) {
            $_SESSION['step'] = 0;
        }
        if (!isset($_SESSION[$variable[$_SESSION['step']]['title']])) {
            $_SESSION[$variable[$_SESSION['step']]['title']] = "";
        }
    }

    public function valueIsIgnored($value, $valuesToIgnore)
    {
        $found = false;
        foreach ($valuesToIgnore as $item) {
            if (strcmp($value, $item) == 0) {
                $found = true;
            }
        }
        return $found;
    }
}

?>

<!-- . -->