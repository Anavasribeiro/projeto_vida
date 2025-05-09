<?php
session_start();

require_once 'C:\Turma2\xampp\htdocs\projeto_vida\View\config.php';
require_once 'C:\Turma2\xampp\htdocs\projeto_vida\Controller\TestePersonalidadeController.php';

// verifica se a variavel $_POST existe
if (isset($_POST)) {

    $controller = new TestePersonalidadeController($pdo);
    $caracteristicas = $controller->obterCaracteristicas($_POST);
}

$caracteristicas_raw = json_encode($caracteristicas);
$id_user = $_SESSION["iduser"];

$sql = "UPDATE users SET caracteristicaspersona = ? WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$caracteristicas_raw, $id_user]);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste resultado</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    <div class="containergafico">

        <h3>Gráfico de personalidade</h3><br><br>
        <script>
            google.charts.load('current', {
                packages: ['corechart', 'bar']
            });
            // Função que será chamada após o carregamento da API
            google.charts.setOnLoadCallback(drawChart);

            // Função para desenhar o gráfico
            function drawChart() {
                // Definir os dados do gráfico
                var data = google.visualization.arrayToDataTable([
                    ['Caracteristicas', 'Valor das caracteristicas'],  // Definir cabeçalhos das colunas
                    ['Extrovertividade', <?= ($_POST[0]) + 2 ?>],  // Dados de exemplo
                    ['Organização', <?= ($_POST[1] * -1) + 2 ?>],
                    ['Explorador', <?= ($_POST[2]) + 2 ?>],
                    ['Autoconsciência', <?= ($_POST[3] * -1) + 2 ?>],
                    ['Autocontrole', <?= ($_POST[4]) + 2 ?>]
                ]);
                // Opções de personalização do gráfico
                var options = {
                    title: 'Resultados do teste',
                    chartArea: { width: '50%' },  // A área do gráfico
                    hAxis: {
                        title: 'Valor das caracteristicas',
                        minValue: 0
                    },

                    // Adicionando animação
                    animation: {
                        startup: true,
                        easing: 'inAndOut',
                        duration: 2000
                    },
                    // Alterando as cores das barras
                    colors: ['#17a17e'],
                    backgroundColor: 'rgb(246, 246, 246)'
                };

                // Criar o gráfico e desenhar dentro da div
                var chart = new google.visualization.BarChart(document.getElementById('columnchart_material'));
                chart.draw(data, options);

            } window.addEventListener('resize', drawChart);
        </script>

        <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
    </div> <br><br>

    <div class="containerinfo">
        <h2>Informações das caracteristicas</h2>
        <div class="oneinfone">
            <div class="iteminfo">
                <h3>Extrovertividade</h3>
                <p> É uma característica da personalidade que descreve indivíduos que buscam energia e prazer em
                    interações sociais e ambientes externos. São pessoas que se sentem mais energizadas ao estar em
                    contato com outras pessoas e eventos sociais, ao contrário de pessoas introvertidas, que preferem a
                    solidão e o mundo interior. </p>
            </div>

            <div class="iteminfo">
                <h3>Organização</h3>
                <p> Em geral, refere-se a um sistema ou grupo de pessoas estruturados para alcançar objetivos
                    específicos, como uma empresa, uma instituição, ou até mesmo a organização de um evento. </p>
            </div>
        </div><br>
        <div class="oneinfone">
            <div class="iteminfo">
                <h3>Explorador</h3>
                <p>A personalidade exploradora, em termos de MBTI (Myers-Briggs Type Indicator) e arquétipos,
                    refere-se a indivíduos que são curiosos, aventureiros e buscam novas experiências. Eles valorizam a
                    liberdade, a individualidade e a autenticidade, rejeitando a rotina e abraçando o desconhecido. </p>
            </div>

            <div class="iteminfo">
                <h3>Autoconsciência</h3>
                <p> Refere-se à capacidade de reconhecer e entender a própria personalidade, incluindo forças,
                    fraquezas, valores e comportamentos, bem como o impacto destes na interação com os outros. </p>
            </div>
        </div>

        <div class="twoinfone">
            <div class="iteminfo">
                <h3>Autocontrole</h3>
                <p>Controlar o estresse envolve adotar um estilo de vida saudável, que inclui exercícios físicos
                    regulares, alimentação balanceada e sono adequado. Além disso, identificar e lidar com os fatores
                    estressores, como o trabalho ou relacionamentos, é essencial para gerenciar o estresse. </p>
            </div>

      
        </div>
        <br><div class="twoinfone"><button class="visualisar-perfil"><a href="enter.php">Voltar para meu perfil</a></button> </div>
        <br><br>
      

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


<script>

</script>