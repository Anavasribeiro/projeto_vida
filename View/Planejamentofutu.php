<?php session_start();
require_once __DIR__ . '/config.php';

$sql = "SELECT * FROM planejamentofutu WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = $user[0];

$sql = "SELECT * FROM planejamentofutu WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$planejamentofutu = $stmt->fetchAll(PDO::FETCH_ASSOC);

$naotemnada = false;
if ($planejamentofutu == false) {
    $naotemnada = true;
}

if ($naotemnada) {
    header('Location: Planejamentofutu-edit.php')
    ;
}

$planejamentofutu = $planejamentofutu[0];

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
    <title>Sobre mim</title>
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


    <div class="quemsoucontai">


        <?php if ($planejamentofutu['aspiracoes'] != '' && $planejamentofutu['aspiracoes'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Minhas Aspirações.</h3>
                <p class="quemsoans"><?= $planejamentofutu['aspiracoes'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($planejamentofutu['sonhoifanc'] != '' && $planejamentofutu['sonhoifanc'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Meu Sonho de Infância.</h3>
                <p class="quemsoans"><?= $planejamentofutu['sonhoifanc'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($planejamentofutu['escprofissionais'] != '' && $planejamentofutu['escprofissionais'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Minha escolha Profissional.</h3>
                <p class="quemsoans"><?= $planejamentofutu['escprofissionais'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($planejamentofutu['sonhoatual'] != '' && $planejamentofutu['sonhoatual'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Meus Sonhos Hoje.</h3>
                <p class="quemsoans"><?= $planejamentofutu['sonhoatual'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($planejamentofutu['principobjetivo'] != '' && $planejamentofutu['principobjetivo'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Meus Principais Objetivos.</h3>
                <p class="quemsoans"><?= $planejamentofutu['principobjetivo'] ?></p>
            </div><br><br>
        <?php endif; ?>




    </div><br><br>

    <div class="twoinfonebtn">

    <button type="submit" class="editar-perfil" href="Planejamentofutu-edit.php">
        <a href="Planejamentofutu-edit.php">
            <h3>Editar formulário</h3>
        </a>
    </button>

    <button class="visualisar-perfil"><a href="enter.php">Voltar para meu perfil</a></button>


    </div>
    
    <br><br><br><br>



   
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