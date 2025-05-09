<?php session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../Controller/TestePersonalidadeController.php';

$sql = "SELECT * FROM planejamentofutu WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$planejamentofutu = $stmt->fetch(PDO::FETCH_ASSOC);

$naotemnada = false;
if ($planejamentofutu == false) {
    $naotemnada = true;
}

; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <title>Cadastrar</title>
</head>

<body>


<header class="header">


<nav class="nav">

    <img src="../IMG/logo -deitada.png" alt="" class="logo">
    <button class="hamburger">
        <i class="fa-solid fa-list-ul"></i></button>

    <ul class="nav-list">
        <li><a href="Index.php">Home</a></li>
        <li><a href="enter.php">Meu Perfil</a></li>
        <li><a href="creator.php">Criadora</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>
</header>
<div class="headersep"></div><br><br>

<h3 class="title">Planejamento para o futuro</h3><br>
 
    <div class="editquemsou">

        <form method="POST">
            <h2>Minhas Aspirações.</h2>
            <input class="quemsouwr" type="text" name="aspiracoes" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $planejamentofutu['aspiracoes'];
                } ?>" /><br>

            <h2>Meu Sonho de Infância.</h2>
            <input class="quemsouwr" type="text" name="sonhoifanc" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $planejamentofutu['sonhoifanc'];
                } ?>"><br>

            <h2>Minha escolha Profissional.</h2>
            <input class="quemsouwr" type="text" name="escprofissionais" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $planejamentofutu['escprofissionais'];
                } ?>"><br>

            <h2>Meus Sonhos Hoje.</h2>
            <input class="quemsouwr" type="text" name="sonhoatual" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $planejamentofutu['sonhoatual'];
                } ?>"><br>

            <h2>Meus Principais Objetivos.</h2>
            <input class="quemsouwr" type="text" name="principobjetivo" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $planejamentofutu['principobjetivo'];
                } ?>"><br>



    
            <button type="submit" class="editar-perfil" href="Planejamentofutu.php">
                <a href="Planejamentofutu.php">
                    <h3>Finalizar</h3>
                </a>
            </button><br>

        </form>

        <br><br>



    </div>


    <?php

    if (!empty($_POST)) {

        if ($naotemnada) {
            $sql = "INSERT INTO 
            `planejamentofutu` (`iduser`, `aspiracoes`, `sonhoifanc`, `escprofissionais`, `sonhoatual`, `principobjetivo`)
                VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_SESSION['iduser'],
                $_POST['aspiracoes'],
                $_POST['sonhoifanc'],
                $_POST['escprofissionais'],
                $_POST['sonhoatual'],
                $_POST['principobjetivo'],
            
            ]);

        } else {
            $sql = "UPDATE `planejamentofutu` SET 
            `aspiracoes` = ?, 
            `sonhoifanc` = ?, 
            `escprofissionais` = ?, 
            `sonhoatual` = ?, 
            `principobjetivo` = ?
            WHERE `iduser` = ?";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['aspiracoes'],
                $_POST['sonhoifanc'],
                $_POST['escprofissionais'],
                $_POST['sonhoatual'],
                $_POST['principobjetivo'],
                $_SESSION['iduser'],
    
            ]);

        }

        header("location: Planejamentofutu.php");
    }
    ?>

    <br><br>



    <footer>
        <div class="footercontent">

            <div class="footercontacts">
                <h1>Meowledge</h1>
                <p>saiba mais sobre si mesmo</p>
                <div class="footer_socialmedia">
                    <a href="" class="footer-link" id="instagram"> <i class="fa-brands fa-instagram"></i> </a>

                    <a href="" class="footer-link" id="twitter"> <i class="fa-brands fa-x-twitter"></i> </a>

                    <a href="" class="footer-link" id="youtube"> <i class="fa-brands fa-youtube"></i> </a>
                </div>
            </div>


            <ul class="footerlist">
                <li>
                    <h3>Blog</h3>
                </li>

                <li>
                    <a href="Index.php" class="footer-link">Home</a>
                </li>
                <li> <a href="creator.php" class="footer-link">Criadora</a></li>
                <li> <a href="login.php" class="footer-link">Login</a></li>

            </ul>

            <ul class="footerlist">
                <li>
                    <h3>Acesso para membros</h3>
                </li>

                <li>
                    <p class="footer-tet">Seu propio perfil</p>
                </li>
                <li>
                    <p>Contato com a criadora</p>
                </li>
                <li>
                    <p>Planos de ação</p>
                </li>

            </ul>


            <div class="footer_number">
                <h3>Contate-nos</h3>
                <p>+55 1888888888888888</p>
                <p>meowledge@gmail.com</p>

            </div>
        </div>
        <div id="footer_copy">
            &#169
            2025 all rights reserved
        </div>

    </footer>

    <script defer src="script.js"></script>
    
</body>

</html>