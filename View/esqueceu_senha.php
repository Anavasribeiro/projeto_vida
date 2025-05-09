<?php

session_start();
require_once 'C:\Turma2\xampp\htdocs\projeto_vida\View\config.php';

if(!empty($_POST)){
    $novasenha = password_hash($_POST['senha'], PASSWORD_DEFAULT);;
    $email = $_POST["email"];

    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $resultado = $stmt->fetch();

    if($resultado){
        $sql = 'UPDATE users SET senha = ? WHERE email = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$novasenha, $email]);
        
        $_SESSION['login_error'] = 'Senha mudada com suscesso!';

        header('Location: login.php');
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
        <div class="form-box" id="login-form" style='display:flex; flex-direction:column'>
            <h2>Alterar a senha</h2>
            <!-- aparece a mensagem de erro -->

            <form action="" method="post">
                <input type="email" name="email" placeholder="seu email" required>
                <input type="password" name="senha" placeholder="sua nova senha" required>
                <button type="submit" name="login" class="btn-base">MUDAR SENHA</button>
            </form>

        </div>

        

    </div>
</body>

</html>