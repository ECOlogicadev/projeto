<?php
session_start();
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica";
// Configuração da conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecologica', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

// Função para verificar o acesso do usuário
function tem_acesso($pagina_id) {
    global $pdo;

    // Verifique se o usuário está logado
    if (!isset($_SESSION['fkPerfil'])) {
        return false;
    }

    // Preparar e executar a consulta
    $stmt = $pdo->prepare('
        SELECT COUNT(*) 
        FROM perfil_pagina pp
        WHERE pp.fkPerfil = :fkPerfil AND pp.fkPagina = :pagina_id
    ');
    $stmt->execute([
        'fkPerfil' => $_SESSION['fkPerfil'],
        'pagina_id' => $pagina_id
    ]);

    return $stmt->fetchColumn() > 0;
}

// Defina o ID da página atual
$pagina_id = 6; // Exemplo para a página de controle de acesso

if (!tem_acesso($pagina_id)) {
    // Redireciona o usuário para uma página de erro ou acesso negado
    header('Location: acesso_negado.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postar Notícia - ECOlógica</title>
    <link rel="stylesheet" href="paginas.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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
                        <span><?php echo $_SESSION['nome']; ?></span>
                        <div class="user-modal">
                            <button class="modal-button" onclick="window.location.href='logout.php'">Logout</button>
                            <?php if (isset($_SESSION['fkPerfil']) && $_SESSION['fkPerfil'] == 1): ?>
                                <!-- Se o usuário for admin, exibe o botão de controle de acesso -->
                                <button class="modal-button" onclick="window.location.href='postar.php'">Postar</button>
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

    <!-- Conteúdo principal -->
    <div class="pagina">
        <div class="conteudo">
            <h1 class="titulo-conteudo">Adicionar Nova Notícia</h1>
            <hr class="divisao">
            <form action="salvar_noticia.php" method="POST" enctype="multipart/form-data">
                <div class="area-texto">
                <label for="titulo">Título:</label><br>
                <input type="text" name="titulo" required><br><br>

                <label for="subtitulo">Subtítulo:</label><br>
                <input type="text" name="subtitulo" required><br><br>
                </div>

                <label for="imagem_principal">Imagem Principal:</label><br>
                <input type="file" name="imagem_principal" accept="image/*" required><br><br>

                <label for="conteudo">Conteúdo:</label><br>
                <textarea name="conteudo" id="conteudo"></textarea><br><br>
                <script>
                    CKEDITOR.replace('conteudo');
                </script>

                <!-- Caixa para marcar "Em Destaque" -->
                <label for="em_destaque">Em Destaque:</label>
                <input type="checkbox" name="em_destaque" value="1"><br><br>

                <button type="submit" class="modal-button">Salvar Notícia</button>
            </form>
        </div>
    </div>

    <!-- Botão para voltar ao topo -->
    <a class="topbtn" href="#"><i class="bx bxs-chevron-up"></i></a>

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

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        // Inicializar o carrossel com o Slick
        $('.conteudo').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            nextArrow: $('.next'),
            prevArrow: $('.prev'),
        });
    </script>
</body>
</html>
