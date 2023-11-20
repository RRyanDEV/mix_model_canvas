<?php
include("../services/authService.php");
include_once("../components/layouts/defaultLayout.php");
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Property -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ryan Gomes" />
    <meta name="keywords" content="PHP, MySQL, HTML, SASS" />
    <!-- Link's -->
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="icon" href="../assets/img/site-logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>Login - Model Canvas</title>
</head>

<body>
    <?php
    function createLogin()
    {
        return '<form class="form" method="post" name="login">
        <div class="containerLogin">
            <div class="login">
    
                <div class="headerLoginBox">
                    <div class="fas fa-sign-in-alt"></div>
                    <b class="loginTitle">Bem Vindo!</b>
                    <h4>Entre com sua conta</h4>
                </div>
    
                <div class="form">
    
                    <div class="form-row">
                        <i class="fas fa-user"></i>
                        <label class="form-label" for="emailLogin">Email</label>
                        <input type="text" class="form-text" name="email"
                            placeholder="Digite seu Email" autofocus="true" />
                    </div>
    
                    <div class="form-row">
                        <i class="fas fa-eye" id="togglePassword"
                            style="margin-left: -30px; cursor: pointer;"></i>
                        <label class="form-label" for="senhaLogin">Senha</label>
                        <input type="password" id="id_password"
                            class="form-text" required name="password"
                            placeholder="Digite sua Senha" />
                    </div>
    
                </div>
    
                <div class="buttons-login">
                    <div class="form-row button-login">
                        <input type="submit" value="Entrar" name="submit"
                            class="btn btn-login" />
                    </div>
                    <p class="btn btn-register"><a
                            href="register.php">Criar Conta</a></p>
                </div>
            </div>
        </div>
    </form>';
    };


    $doc = new DOMDocument();

    $doc->loadHTML('<?xml encoding="utf-8" ?>' . createLogin());

    echo $doc->saveHTML();
    ?>
</body>
<script>
    // Hide/Show password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');
    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>

</html>