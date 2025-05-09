<?php
session_start();
require_once 'C:\Turma2\xampp\htdocs\projeto_vida\View\config.php';

if (isset($_POST['cadastro'])) {
    // Dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $datanascimento = $_POST['datanascimento'];
    $sobremim = $_POST['sobremim'];
    $sobreprofissao = $_POST['sobreprofissao'];
    
        // Lidar com o upload de foto
        $fotoperfil = '';
        if (isset($_FILES['fotoperfil']) && $_FILES['fotoperfil']['error'] == 0) {
            $extensao = pathinfo($_FILES['fotoperfil']['name'], PATHINFO_EXTENSION);
            $fotoperfil = 'foto_' . uniqid() . '.' . $extensao;
    
            // Diretório onde a foto será armazenada
            $diretorio = 'uploads/';
            $caminho_foto = $diretorio . $fotoperfil;
    
            // Move a foto para o diretório
            if (!move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $caminho_foto)) {
                echo "Erro ao fazer upload da foto.";
                exit;
            }
        }

    //PDO
    $checkEmail = $pdo->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->rowCount() > 0) {
        
        $_SESSION['cadastro_error'] = 'Email já registrado';
        $_SESSION['active_form'] = 'Cadastro';
        header("Location: login.php");
        exit();
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (nome, email, senha, datanascimento, sobremim, sobreprofissao, fotoperfil) VALUES (:nome, :email, :senha, :datanascimento, :sobremim, :sobreprofissao, :fotoperfil)");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":datanascimento", $datanascimento);
        $stmt->bindParam(":sobremim", $sobremim);
        $stmt->bindParam(":sobreprofissao", $sobreprofissao);
        $stmt->bindParam(":fotoperfil", $fotoperfil);

        if ($stmt->execute()) {
            echo "User registered successfully!";

           
        } else {
            echo "Error inserting user.";
        }
    }

    header("Location: login.php");
    exit();

}

if (isset($_POST['login'])) {


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Usar prepared statements para evitar SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Correção do fetch_assoc()

        
        if (password_verify($senha, $user['senha'])) { // Certifique-se de que a coluna correta é usada
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['fotoperfil'] = $user['fotoperfil'];
            $_SESSION['data_nascimento'] = $user['datanascimento'];
            $_SESSION['sobremim'] = $user['sobremim'];
            $_SESSION['sobreprofissao'] = $user['sobreprofissao'];
            $_SESSION['iduser'] = $user['iduser'];
            header("Location: enter.php");
            exit();
        }
    }

    // Se a autenticação falhar
    $_SESSION['login_error'] = 'Senha ou email incorreto';
    $_SESSION['active_form'] = 'login';
    header("Location: login.php");
    exit();
}