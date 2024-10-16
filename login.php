<?php
session_start();

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica";

$conectar = new mysqli($servername, $username, $password, $dbname);

if ($conectar->connect_error) {
    die("Conexão falhou: " . $conectar->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara e executa a consulta
    $stmt = $conectar->prepare("SELECT u.id, u.nome, u.senha, u.fkPerfil 
                                FROM usuarios u 
                                WHERE u.email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome, $stored_password, $fkPerfil);
        $stmt->fetch();

        if (password_verify($senha, $stored_password)) {
            $_SESSION['idUsuario'] = $id;
            $_SESSION['nome'] = $nome;
            $_SESSION['fkPerfil'] = $fkPerfil;

            header("Location: home.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
}

$conectar->close();
?>
