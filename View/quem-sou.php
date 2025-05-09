<?php session_start();
require_once __DIR__ . '/config.php';

$sql = "SELECT * FROM users WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = $user[0];

$sql = "SELECT * FROM quemsou WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$quemsou = $stmt->fetchAll(PDO::FETCH_ASSOC);

$naotemnada = false;
if ($quemsou == false) {
    $naotemnada = true;
}

if ($naotemnada) {
    header('Location: quem-sou-edit.php')
    ;
}

$quemsou = $quemsou[0];

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

    <h3 class="title">Quem sou eu?</h3><br>


    <div class="quemsoucontai">
        <?php if ($user['sobremim'] != '' && $user['sobremim'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Sobre mim</h3>
                <p class="quemsoans"><?= $user['sobremim'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['lembrancas'] != '' && $quemsou['lembrancas'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Minhas lembranças</h3>
                <p class="quemsoans"><?= $quemsou['lembrancas'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['pontosfracos'] != '' && $quemsou['pontosfracos'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Pontos Fracos</h3>
                <p class="quemsoans"><?= $quemsou['pontosfracos'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['pontosfortes'] != '' && $quemsou['pontosfortes'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Pontos Fortes</h3>
                <p class="quemsoans"><?= $quemsou['pontosfortes'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['valores'] != '' && $quemsou['valores'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Valores</h3>
                <p class="quemsoans"><?= $quemsou['valores'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['aptidoes'] != '' && $quemsou['aptidoes'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Aptidões</h3>
                <p class="quemsoans"><?= $quemsou['aptidoes'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['relacionamentos'] != '' && $quemsou['relacionamentos'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Relacionamentos</h3>
                <p class="quemsoans"><?= $quemsou['relacionamentos'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['diadia'] != '' && $quemsou['diadia'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Dia a Dia</h3>
                <p class="quemsoans"><?= $quemsou['diadia'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['vidaescolar'] != '' && $quemsou['vidaescolar'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Vida Escolar</h3>
                <p class="quemsoans"><?= $quemsou['vidaescolar'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['minhavisao'] != '' && $quemsou['minhavisao'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Minha visão sobre mim.</h3>
                <p class="quemsoans"><?= $quemsou['minhavisao'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['visaogeral'] != '' && $quemsou['visaogeral'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">A visão dos outros sobre mim</h3>
                <p class="quemsoans"><?= $quemsou['visaogeral'] ?></p>
            </div><br><br>
        <?php endif; ?>

        <?php if ($quemsou['autovalorizacao'] != '' && $quemsou['autovalorizacao'] != null): ?>
            <div class="itemquemso">
                <h3 class="quemsotitl">Expectativa do meu nível de sucesso.</h3>
                <p class="quemsoans"><?= $quemsou['autovalorizacao'] ?></p>
            </div><br><br>
        <?php endif; ?>



    </div><br><br>

    <div class="twoinfonebtn">
        <button class="visualisar-perfil"><a href="enter.php">Voltar para meu perfil</a></button>


            <button type="submit" class="editar-perfil" href="quem-sou-edit.php">
                <a href="quem-sou-edit.php">
                    <h3>Editar formulário</h3>
                </a>
            </button>
    </div>
    <br><br><br>


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