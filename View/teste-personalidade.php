<?php
require_once 'C:\Turma2\xampp\htdocs\projeto_vida\View\config.php';
require_once 'C:\Turma2\xampp\htdocs\projeto_vida\Controller\TestePersonalidadeController.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTE PERSONALIDADE</title>
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


    <div class="cadastro">
        <h1>Teste de Personalidade</h1><br><br>

        <form method="POST" action="resultado-teste.php" class="entertestewid">
            <?php

            //Chamamos o Conroller e inserimos as perguntas com a função listarPerguntas. Para escrevelas, fizemos o foreach pra iprimir o texto
            $controller = new TestePersonalidadeController($pdo);

            // pega as perguntas da tabela 
            $perguntas = $controller->listarPerguntas();
            ?>
            <?php
            // faz um loop para impirmir todas pergutnas
            foreach ($perguntas as $pergunta): ?>
                <h3 class="textquestion"><?= $pergunta['texto_pergunta'] ?></h3>

                <div style="display:flex; gap:10px">
                    <p class="aco_dc">Concordo</p>
                    <div style="display:flex; input:">

                        <input type="radio" name="<?= $pergunta['id_pergunta'] ?>" value="-2" required>
                    </div>

                    <div style="display:flex;">

                        <input type="radio" name="<?= $pergunta['id_pergunta'] ?>" value="-1" required>
                    </div>

                    <div style="display:flex;">

                        <input type="radio" name="<?= $pergunta['id_pergunta'] ?>" value="0" required>
                    </div>

                    <div style="display:flex;">

                        <input type="radio" name="<?= $pergunta['id_pergunta'] ?>" value="1" required>
                    </div>

                    <div style="display:flex;">

                        <input type="radio" name="<?= $pergunta['id_pergunta'] ?>" value="2" required>
                    </div>
                    <p class="aco_dc">Discordo</p>
                </div><br>
            <?php endforeach; ?>
            <button type="submit" class="endtest">finalizar teste</button><br><br>




        </form>
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