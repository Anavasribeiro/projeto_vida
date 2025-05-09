<?php session_start();
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../Controller/TestePersonalidadeController.php';

$sql = "SELECT * FROM users WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = $user[0];

if (!isset($_SESSION['iduser'])){
    header("Location: index.php");
}

$sql = "SELECT * FROM quemsou WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$quemsou = $stmt->fetch(PDO::FETCH_ASSOC);

$naotemnada = false;
if ($quemsou == false) {
    $naotemnada = true;
};
?>

<?php

    if (!empty($_POST)) {

        if ($naotemnada) {
            $sql = "INSERT INTO 
            `quemsou` (`iduser`, `lembrancas`, `pontosfracos`, `pontosfortes`, `valores`, `aptidoes`, 
            `relacionamentos`, `diadia`, `vidaescolar`, `minhavisao`, `visaogeral`, `autovalorizacao`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_SESSION['iduser'],
                $_POST['lembrancas'],
                $_POST['pontosfracos'],
                $_POST['pontosfortes'],
                $_POST['valores'],
                $_POST['aptidoes'],
                $_POST['relacionamentos'],
                $_POST['diadia'],
                $_POST['vidaescolar'],
                $_POST['minhavisao'],
                $_POST['visaogeral'],
                $_POST['autovalorizacao']
            ]);

        } else {
            $sql = "UPDATE `quemsou` SET 
            `lembrancas` = ?, 
            `pontosfracos` = ?, 
            `pontosfortes` = ?, 
            `valores` = ?, 
            `aptidoes` = ?, 
            `relacionamentos` = ?, 
            `diadia` = ?, 
            `vidaescolar` = ?, 
            `minhavisao` = ?, 
            `visaogeral` = ?, 
            `autovalorizacao` = ?
            WHERE `iduser` = ?";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['lembrancas'],
                $_POST['pontosfracos'],
                $_POST['pontosfortes'],
                $_POST['valores'],
                $_POST['aptidoes'],
                $_POST['relacionamentos'],
                $_POST['diadia'],
                $_POST['vidaescolar'],
                $_POST['minhavisao'],
                $_POST['visaogeral'],
                $_POST['autovalorizacao'],
                $_SESSION['iduser']
            ]);

        }

        $sql = "UPDATE `users` SET 
        `sobremim` = ?
        WHERE `iduser` = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['sobremim'],
            $_SESSION['iduser']
        ]);

        header("Location: quem-sou.php");
    }
    ?>

    
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


<h3 class="title">Quem sou eu?</h3><br><br>

 
    <div class="editquemsou">

        <form method="POST">

  

            <h2>Sobre mim</h2>


            <input class="quemsouwr" type="text" name="sobremim" placeholder="escreva aqui" required
                value="<?php echo $user['sobremim'] ?>" /><br>

            <h2>Minhas lembranças</h2>
            <input class="quemsouwr" type="text" name="lembrancas" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['lembrancas'];
                } ?>" /><br>

            <h2>Pontos fracos.</h2>
            <input class="quemsouwr" type="text" name="pontosfracos" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['pontosfracos'];
                } ?>"><br>

            <h2>Pontos fortes.</h2>
            <input class="quemsouwr" type="text" name="pontosfortes" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['pontosfortes'];
                } ?>"><br>

            <h2>Valores.</h2>
            <input class="quemsouwr" type="text" name="valores" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['valores'];
                } ?>"><br>

            <h2>Aptidões.</h2>
            <input class="quemsouwr" type="text" name="aptidoes" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['aptidoes'];
                } ?>"><br>

            <h2>Relacionamentos.</h2>
            <input class="quemsouwr" type="text" name="relacionamentos" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['relacionamentos'];
                } ?>"><br>

            <h2>Meu dia a dia.</h2>
            <input class="quemsouwr" type="text" name="diadia" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['diadia'];
                } ?>"><br>

            <h2>Minha vida escolar.</h2>
            <input class="quemsouwr" type="text" name="vidaescolar" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['vidaescolar'];
                } ?>"><br>

            <h2>Minha visão sobre mim.</h2>
            <input class="quemsouwr" type="text" name="minhavisao" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['minhavisao'];
                } ?>"><br>

            <h2>A visão dos outros sobre mim.</h2>
            <input class="quemsouwr" type="text" name="visaogeral" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['visaogeral'];
                } ?>"><br>

            <h2>Expectativa do meu nível de sucesso.</h2>
            <input class="quemsouwr" type="text" name="autovalorizacao" placeholder="escreva aqui" required
                value="<?php if (!$naotemnada) {
                    echo $quemsou['autovalorizacao'];
                } ?>"><br><br><br>



    
            <button type="submit" class="editar-perfil" href="quem-sou.php">
                <a href="quem-sou-edit.php">
                    <h3>Finalizar</h3>
                </a>
            </button><br>

        </form>

        <br><br>



    </div>


    

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