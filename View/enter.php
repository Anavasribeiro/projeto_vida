<?php session_start();
require_once 'config.php';

$sql = "SELECT * FROM users WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = $user[0];

if (!isset($_SESSION['iduser'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>MEU PERFIL</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
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


    <button type="submit" class="editar-perfil" href="editar_perfil.php">
        <a href="editar_perfil.php">
            <h3>Editar perfil</h3>
        </a>
    </button><br><br>

    <div class="profpri">

        <div class="imgdiv">
            <img src="uploads/<?php echo $user['fotoperfil'] ?>" alt="photo" class="imgprofilegr">
        </div>

        <div class="textconten">
            <p class="tituloperfil">NOME</p>
            <p class="repostaperfil"><?php echo $user['nome'] ?></p><br>

            <p class="tituloperfil">DATA DE NASCIMENTO</p>
            <p class="repostaperfil"><?php echo $user['datanascimento'] ?></p><br>
        </div>

    </div><br><br><br>


    <div class="profinf3">
        <p class="tituloperleft">SOBRE A PROFISSÂO</p>
        <p class="repostaperfilleft"><?php echo $user['sobreprofissao'] ?></p><br>
    </div><br><br>

    <?php if ($user['caracteristicaspersona']): ?>
        <div class="profinf3">
            <p class="tituloperfilwhit">CARACTERÍSTICAS DE PERSONALIDADE</p>

            <?php foreach (json_decode($user['caracteristicaspersona']) as $caracteristica): ?>
                <p class="repostaperfilwhit"><?php echo $caracteristica ?></p><br>
            <?php endforeach; ?>
        </div><br><br>
    <?php endif ?>



    <div class="recurostainer">
        <br>

        <h1>Meus Recursos</h1><br>

        <div class="linkstainer">

            <button class="link-item">
                <p class="icon-link"><i class="fa-solid fa-paw"></i></p>
                <a href="teste-personalidade.php" class="text-link">Teste de
                    personalidade</a>
            </button>

            <button class="link-item">
                <p class="icon-link"><i class="fa-solid fa-paw"></i></p>
                <a href="quem-sou.php" class="text-link">Quem sou eu</a>
            </button>

            <button class="link-item">
                <p class="icon-link"><i class="fa-solid fa-paw"></i></p>
                <a href="Planodeacao.php" class="text-link">Plano de ação</a>
            </button>

            <button class="link-item">
                <p class="icon-link"><i class="fa-solid fa-paw"></i></p>
                <a href="Planejamentofutu.php" class="text-link">Planejamento para o futuro</a>
            </button>



        </div><br><br><br>

    </div>


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