<?php

session_start();


// guarda as mensagens de erro que podem acontecer 
$errors = [
    'login' => isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '',
    'cadastro' => isset($_SESSION['cadastro_error']) ? $_SESSION['cadastro_error'] : '',
];

if (isset($_SESSION['active_form'])){
    if($_SESSION['active_form'] != 'login'){
        $activeForm = "Cadastro";
    }else{
        $activeForm = "Login";
    }
}else{
    $activeForm = "Login";
}

//remove as sessoes disponiv=eis antes
session_unset();

function showError($error)
{
    if (!empty($error)){
echo "<p class='error_message'> $error <p/>";
    } 
}


function isActiveForm($formName, $activeForm)
{
    if($formName == $activeForm){
       echo 'active';
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOGIN</title>
</head>

<body>

    <div class="container">
        <div class="form-box <?php isActiveForm( 'Login', $activeForm)?>" id="login-form">
            <h2>Login</h2>
            <?php showError($errors['login']); ?>
            <!-- aparece a mensagem de erro -->

            <form action="login_cadastro.php" method="post">
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="senha" placeholder="senha" required>
                <button type="submit" name="login" class="btn-base">LOGIN</button>
                <p>Não tem uma conta? <a href="#" onclick="showForm('cadastro-form')">Registre-se aqui</a></p>
                <p>Esqueceu sua senha? <a href="esqueceu_senha.php">Recupere sua conta aqui</a></p>
                <!-- o onclic vai chamar a função usando a validação com o id-->
            </form>

        </div>
        <br><br>


        <div class="form-box  <?php isActiveForm('Cadastro', $activeForm); ?> " id="cadastro-form">

            <form action="login_cadastro.php" method="post" enctype="multipart/form-data">
                <h2>Cadastro</h2>
                <?php showError($errors['cadastro']); ?>
                <input type="text" name="nome" placeholder="nome" required>
                <input type="date" name="datanascimento" placeholder="data nascimento" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="senha" placeholder="senha" required>
                <input type="text" name="sobremim" placeholder="sobre mim" required>
                <input type="text" name="sobreprofissao" placeholder="sobre a sua profissão" required>


                <label for="foto_perfil">Foto de Perfil:</label>
                <input type="file" id="fotoperfil" name="fotoperfil" accept="image/*" required>

                <br><br>
                <button type="submit" name="cadastro" class="btn-base">CADASTRE-SE</button>
                <p>Já tem uma conta? <a href="#" onclick="showForm('login-form')">entre aqui</a></p>
            </form>

        </div>
        

    </div>
    <script src="script.js"></script>
</body>

</html>