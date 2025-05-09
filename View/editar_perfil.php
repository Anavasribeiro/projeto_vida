<?php session_start(); 
require_once 'C:\Turma2\xampp\htdocs\projeto_vida\View\config.php';

$sql = "SELECT * FROM users WHERE iduser = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['iduser']]);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = $user[0];

if (!isset($_SESSION['iduser'])){
    header("Location: index.php");
}


if(!empty($_POST)){
    $nome = $_POST['nome'];
    $datanascimento = $_POST['datanascimento'];
    $sobreprofissao = $_POST['sobreprofissao'];

    $iduser = $_SESSION["iduser"];

    $fotoperfil = $user['fotoperfil'];

    if (isset($_FILES['fotoperfilnova']) && $_FILES['fotoperfilnova']['error'] == 0) {
        $fotoperfil = '';
        $extensao = pathinfo($_FILES['fotoperfilnova']['name'], PATHINFO_EXTENSION);
        $fotoperfil = 'foto_' . uniqid() . '.' . $extensao;

        // Diretório onde a foto será armazenada
        $diretorio = 'uploads/';
        $caminho_foto = $diretorio . $fotoperfil;

        // Move a foto para o diretório
        if (!move_uploaded_file($_FILES['fotoperfilnova']['tmp_name'], $caminho_foto)) {
            echo "Erro ao fazer upload da foto.";
            exit;
        }
    }

    $sql = "UPDATE users SET 
    nome = ?,
    datanascimento = ?,
    sobreprofissao = ?,
    fotoperfil = ?
    WHERE iduser = ?";
    $stmt = $pdo->prepare($sql);
    $j = $stmt->execute([$nome,$datanascimento,$sobreprofissao,$fotoperfil,$iduser]);
    

   

    if($j){
        $_SESSION['nome'] = $nome;
        $_SESSION['datanascimento'] = $datanascimento;

        $_SESSION['sobreprofissao'] = $sobreprofissao;
        $_SESSION['iduser'] = $iduser;
        $_SESSION['fotoperfil'] = $fotoperfil;
    }

    header("Location: enter.php");
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <nav class="nav">

            <img src="../IMG/logo -deitada.png" alt="" class="logo">
            <button class="hamburger"><i class="fa-solid fa-list"></i></button>
            <ul class="nav-list">
                <li><a href="#">HOME</a></li>
                <li><a href="#">PERFIL</a></li>
                <li><a href="#">QUEM SOU EU?</a></li>
                <li><a href="#">LOG OUT</a></li>
            </ul> 
            <button class="btn-login"> <a href="login.php" class="btn-logina"> LOG IN <i
                        class="fa-solid fa-arrow-right-to-bracket"></i></a></button>

        </nav>
    </header>
    <div class="headersep"></div>

        <form method="POST" enctype="multipart/form-data"><br>
            <button type="submit" class="editar-perfil" href="enter.php">
                <a href="enter.php"></a><h3>confirmar atualizações</h3>
            </button><br><br>
            <div class="profpri">

                <label for="fotoperfilnova" class="imgdiv mudarperfil">
                    <img src="uploads/<?php echo $user['fotoperfil'] ?>" alt="photo" class="imgprofilegr">
                </label>
                <input type="file" id="fotoperfilnova" name="fotoperfilnova" style="display:none">
                <div class="textconten">
                    <p class="tituloperfil">NOME</p>
                    <input name="nome" placeholder="escreva aqui" class="repostaperfil" value="<?=$user['nome'] ?>"><br>

                    <p class="tituloperfil">DATA DE NASCIMENTO</p>
                    <input name="datanascimento" class="repostaperfil" type=date value="<?=$user['datanascimento']?>"/><br>
                </div>

            </div><br><br><br>


            
            <div class="profinf3">
            <p class="tituloperleft">SOBRE A PROFISSÂO</p>
            <textarea name="sobreprofissao" placeholder="escreva aqui" class="answertextarea"><?php echo $user['sobreprofissao'] ?></textarea><br>   
            </div>
        </form>





        <script defer src="script.js"></script>

</body>

</html>