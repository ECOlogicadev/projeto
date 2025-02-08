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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                 </form>
            </div>

            <!-- Área do Usuário -->
            <div class="user">
                <div class="user-container">
                    <?php if (isset($_SESSION['nome'])): ?>
                        <!-- Se o usuário estiver logado, exibe o nome e o botão de logout -->
                        <span><?php echo " " . $_SESSION[ 'nome']; ?></span>
                        <div class="user-modal">
                            <button class="modal-button" onclick="window.location.href='logout.php'">Logout</button>
                            <?php if (isset($_SESSION['fkPerfil']) && $_SESSION['fkPerfil'] == 1): ?>
                                <!-- Se o usuário for admin, exibe o botão de controle de acesso -->
                                <button class="modal-button" onclick="window.location.href='postar.php'">Postar</button>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['fkPerfil']) && $_SESSION['fkPerfil'] == 1): ?>
                                <!-- Se o usuário for admin, exibe o botão de controle de acesso -->
                                <button class="modal-button" onclick="window.location.href='listar.php'">Editar</button>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <!-- Se o usuário não estiver logado, exibe o ícone de login -->
                        <button class="session"><i class='bx bxs-user'></i></button>
                        <div class="user-modal">
                            <button class="modal-button" onclick="window.location.href='login.html'">Login</button>
                            <button class="modal-button" onclick="window.location.href='cadastro.html'">Cadastro</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
<h1 class="titulo-noticias">Resultados da Pesquisa</h1>
<div class="main">

<?php
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
$conn->close();?>

</div>
    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-left">
            <h3>ECOlógica</h3>
            <p class="footer-links">
                <a href="index.php" class="link-1">Home</a>
                <a href="sobre.php">Sobre</a>
            </p>
            <p class="footer-company-name">ECOlógica © 2023 - 2025</p>
        </div>
        <div class="footer-center">
            <div><i class="bx bxs-map"></i><p><span>Rodovia MA 201, Km 12</span> São José de Ribamar - MA</p></div>
            <div><i class="bx bxs-phone"></i><p>+99 99999-9999</p></div>
            <div><i class="bx bxl-gmail"></i><p><a href="mailto:ecologica.ini@gmail.com">ecologica.ini@gmail.com</a></p></div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>Sobre nós</span>
                A ECOlógica é uma plataforma digital que promove a consciência ambiental e a sustentabilidade.
            </p>
            <div class="footer-icons">
                <a href="https://www.instagram.com/ecologica_ofc/"><i class="bx bxl-instagram-alt"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>';

