<?php
require("databaseConnector.php");

function performQuery($type, $args)
{
    $connection = new DatabaseConnector();
    $query = "";
    $result = "";
    switch ($type) {
        case "string":
            $result =  mysqli_real_escape_string($connection->connect(), $args[0]);
            break;
        case "insert": //Envia os valores que o usuário preencher
            $query = "INSERT INTO blocos(id_user,pergunta,resposta) 
            VALUES ($args[0] , '$args[1]', '$args[2]')";
            mysqli_query($connection->connect(), $query);
            break;
        case 'insertUser': //Cria o login do usúario
            $query = "INSERT into `users` (username, password, email, create_datetime)
            VALUES ('$args[0]', '" . md5($args[1]) . "', '$args[2]', '$args[3]')";
            $result = mysqli_query($connection->connect(), $query);
            break;
        case "update": //Altera as informações do usuário no banco
            $query = "UPDATE blocos SET resposta='$args[0]' WHERE id_user='$args[1]' and pergunta='$args[2]'";
            mysqli_query($connection->connect(), $query);
            break;
        case "select": //Pega um valor do banco, com base no ID do usúario
            $query = "SELECT * FROM `blocos` WHERE id_user ='$args[0]'";
            $queryResult = mysqli_query($connection->connect(), $query);
            $result = mysqli_fetch_all($queryResult, MYSQLI_NUM);
            break;
        case "selectProject":
            $query = "SELECT * FROM `projetos` WHERE id_user='$args[0]'";
            $queryResult = mysqli_query($connection->connect(), $query);
            $result = mysqli_fetch_all($queryResult, MYSQLI_NUM);
            // print_r($result);
            break;
        case "selectProjectByID":
            $query = "SELECT * FROM `projetos` WHERE id_user='$args[0]' AND id='$args[1]'";
            $queryResult = mysqli_query($connection->connect(), $query);
            $result = mysqli_fetch_all($queryResult, MYSQLI_NUM);
            // print_r($result);
            break;
        case "insertProject":
            $query = "INSERT INTO `projetos` (id_user, projeto_nome, projeto_desc) VALUES ('$args[0]' , '$args[1]', '$args[2]')";
            $result = mysqli_query($connection->connect(), $query);
            break;
        case "selectBlocos":
            $query = "SELECT b.id, b.id_projeto, p.projeto_nome, p.projeto_desc, b.id_user, b.pergunta, b.resposta
            FROM mix_canvas.blocos AS b
            LEFT JOIN mix_canvas.projetos AS p
            ON p.id=b.id_projeto
            WHERE b.id_user =' $args[0] ' AND b.id_projeto = ' $args[1] ' ";
            $queryResult = mysqli_query($connection->connect(), $query);
            $result = mysqli_fetch_all($queryResult, MYSQLI_NUM);
            // print_r($result);
            break;
        default: //Checa credenciais
            $query = "SELECT * FROM `users` WHERE email='$args[0]' AND password='" . ($args[1]) . "'";
            $queryResult = mysqli_query($connection->connect(), $query);
            $rows = mysqli_num_rows($queryResult);
            $fetch = mysqli_fetch_array($queryResult);
            $result = [$rows, $fetch];
            break;
    }
    $connection->disconnect();
    if (!empty($result)) {
        return $result;
    }
}


?>
<!-- . -->