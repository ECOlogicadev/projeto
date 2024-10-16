<?php 
session_start();

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica";

// Criar conexão
$conectar = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conectar->connect_error) {
    die("Conexão falhou: " . $conectar->connect_error);
}

// Esse If faz a verificação para garantir que os dados tenham sido enviados pelo método POST 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $created = date('Y-m-d H:i:s');

    // Validação básica
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido.";
        exit;   
    }
    
    // Aplicar hash à senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Prepara e executa a inserção, definindo fkPerfil como 2 (convidado)
    $stmt = $conectar->prepare("INSERT INTO usuarios (nome, email, senha, created, fkPerfil) VALUES (?, ?, ?, ?, 2)");
    
    if ($stmt === false) {
        echo "Erro na preparação da consulta.";
        exit;
    }

    $stmt->bind_param("ssss", $nome, $email, $senha_hash, $created);

    if ($stmt->execute()) {
        // Mensagem de sucesso e botão de retorno
        echo "Usuário registrado com sucesso. <br>";
        echo "<button onclick=\"window.location.href='home.php'\">Voltar para Home</button>";
    } else {
        echo "Erro ao registrar usuário.";
    }

    // Fechar declaração e conexão
    $stmt->close();
}

$conectar->close();
?>
