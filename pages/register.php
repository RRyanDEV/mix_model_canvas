<?php

include_once("../api/authAPI.php");
include_once("../services/database/performQuery.php");

authHandler('REQUEST');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="icon" href="../assets/img/site-logo.png" />
    <title>Registrar</title>
</head>

<body>
    <form class="form" action="" method="post">
        <div class="containerLogin">
            <div class="register">
                <div class="headerLoginBox">
                    <div class="fas fa-user-circle"></div>
                    <b class="loginTitle_register">Criar Conta</b>
                </div>
                <div class="form">
                    <div class="form-row">
                        <i class="fas fa-user"></i>
                        <label class="form-label" for="username">Nome</label>
                        <input type="text" class="form-text" name="username" placeholder="Digite seu Nome" required>
                    </div>
                    <div class="form-row">
                        <i class="fas fa-envelope"></i>
                        <label class="form-label" for="user_email">E-mail</label>
                        <input type="text" class="form-text" name="email" placeholder="Digite seu Email" required>
                    </div>
                    <div class="form-row">
                        <i class="fas fa-eye" id="togglePasswordR" style="margin-left: -30px; cursor: pointer;"></i>
                        <label class="form-label" for="password">Senha</label>
                        <input type="password" class="form-text" name="password" placeholder="Digite sua Senha" required id="id_passwordR">
                        <div class="buttons-login">
                            <div class="form-row button-login">
                                <input class="btn btn-login" type="submit" name="submit" value="Criar Conta" class="login-button">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</body>
<script>
    // Hide/Show password
    const togglePasswordRegister = document.querySelector('#togglePasswordR');
    const passwordRegister = document.querySelector('#id_passwordR');

    togglePasswordRegister.addEventListener('click', function(e) {
        const type = passwordRegister.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordRegister.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>

</html>