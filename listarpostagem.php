<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica"; // Substitua pelo nome correto do banco

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta para pegar todas as postagens
$query = "SELECT titulo, conteudo, imagem, created FROM postagens ORDER BY created DESC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagens</title>
    <link rel="stylesheet" href="paginas.css"> <!-- Substitua pelo caminho correto do seu CSS -->
</head>
<body>

<nav>
    <div class="nav-bar">
        <div class="logo-cabecalho">
            <img src="logo.png" alt="Logo"> <!-- Substitua pelo caminho da sua logo -->
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="listar_postagens.php">Postagens</a></li>
                <!-- Adicione outros links conforme necessário -->
            </ul>
        </div>
    </div>
</nav>

<div class="conteudo">
    <h1 class="titulo-conteudo">Postagens</h1>

    <?php
    if ($result->num_rows > 0) {
        // Exibindo as postagens
        while ($row = $result->fetch_assoc()) {
            echo "<div class='divisao'>";
            echo "<h2 class='topico-conteudo'>" . $row['titulo'] . "</h2>";
            echo "<p>" . $row['conteudo'] . "</p>";

            // Exibindo a imagem, se houver
            if ($row['imagem']) {
                echo "<img src='" . $row['imagem'] . "' alt='Imagem da Postagem' class='imagens'><br>";
            }

            echo "<small>Publicado em: " . date('d/m/Y H:i:s', strtotime($row['created'])) . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma postagem encontrada.</p>";
    }
    ?>

</div>

<!-- Rodapé (opcional) -->
<footer class="footer">
    <div class="footer-left">
        <h3>Sua Empresa</h3>
        <p class="footer-links">
            <a href="#">Home</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
        </p>
        <p class="footer-company-name">Sua Empresa © 2024</p>
    </div>
</footer>

</body>
</html>

<?php
// Fechando a conexão
$conn->close();
?>
