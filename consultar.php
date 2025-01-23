<?php
session_start();
?>

<?php
// Configurações de conexão com o banco de dados
$host = 'localhost'; // Nome do host
$username = 'root'; // Nome de usuário do banco de dados
$password = ''; // Senha do banco de dados
$database = 'ecologica'; // Nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Iniciar o HTML para a exibição
echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
 <!-- Cabeçalho -->
    <nav>
        <!-- Logo -->
        <div class="nav-bar">
            <div class="logo-cabecalho"><a href="index.php"><img src="logos/logo.jpg"></a></div>

            <!-- Páginas destacadas -->
            <div class="menu">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="residuos.php">Tipos de Resíduos</a></li>
                    <li><a href="PNRS.php">PNRS</a></li>
                    <li><a href="cooperativas.php">Cooperativas</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                </ul>
            </div>

            <!-- Área de Pesquisa -->
            <div class="searchBox">
                <form action="consultar.php" method="GET" class="search-field">
                    <input type="text" name="query" placeholder="Buscar" required>
                    <button type="submit"><i class="bx bx-search search"></i></button>
                </form>
            </div>

            <!-- Área do Usuário -->
            <div class="user">
                <div class="user-container">
                    <?php if (isset($_SESSION["nome"])): ?>
                        <!-- Se o usuário estiver logado, exibe o nome e o botão de logout -->
                        <span><?php echo $_SESSION["nome"]; ?></span>
                        <div class="user-modal">
                            <button class="modal-button" onclick="window.location.href="logout.php">Logout</button>
                            <?php if (isset($_SESSION["fkPerfil"]) && $_SESSION["fkPerfil"] == 1): ?>
                                <!-- Se o usuário for admin, exibe o botão de controle de acesso -->
                                <button class="modal-button" onclick="window.location.href="postar.php"">Postar</button>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <!-- Se o usuário não estiver logado, exibe o ícone de login -->
                        <button class="session"><i class="bx bxs-user"></i></button>
                        <div class="user-modal">
                            <button class="modal-button" onclick="window.location.href="login.html"">Login</button>
                            <button class="modal-button" onclick="window.location.href="cadastro.html"">Cadastro</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
<h1 class="titulo-noticias">Resultados da Pesquisa</h1>
<div class="main">';

// Verificar se há uma consulta
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Preparar a consulta
    $sql = "SELECT id, titulo, subtitulo, imagem_principal FROM noticias WHERE titulo LIKE ? OR conteudo LIKE ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }

    // Adicionar os parâmetros com wildcard
    $likeQuery = "%" . $query . "%";
    $stmt->bind_param("ss", $likeQuery, $likeQuery);

    // Executar a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Exibir os resultados
        while ($row = $result->fetch_assoc()) {
            echo '<div class="cards">';
            echo '<img src="uploads/' . htmlspecialchars($row['imagem_principal']) . '" alt="Imagem da Notícia">';
            echo '<div class="texto">';
            echo '<h4><a href="noticia.php?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['titulo']) . '</a></h4>';
            echo '<p>' . htmlspecialchars($row['subtitulo']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum resultado encontrado para "<strong>' . htmlspecialchars($query) . '</strong>".</p>';
    }

    $stmt->close();
}

// Encerrar conexão e finalizar HTML
$conn->close();

echo '</div>
<footer class="footer">
    <p class="footer-company-name">ECOlógica © 2023 - 2024</p>
</footer>
</body>
</html>';
?>
