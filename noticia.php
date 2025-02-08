<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícia - ECOlógica</title>
    <link rel="stylesheet" href="paginas.css">
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
    <div class="pagina">
        <div class="conteudo">
            <?php
            if (isset($_GET['id'])) {
                $conn = new mysqli('localhost', 'root', '', 'ecologica');
                if ($conn->connect_error) {
                    die('Erro na conexão: ' . $conn->connect_error);
                }

                $id = $_GET['id'];
                $sql = "SELECT * FROM noticias WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<h1 class="titulo-conteudo">' . $row['titulo'] . '</h1>';
                    echo '<h2 class="subtitulo-noticia">' . $row['subtitulo'] . '</h2>'; 
                    echo '<hr class="divisao">';
                    echo '<p class="info-noticia">Publicado em: ' . $row['data_criacao'] . '</p>';
                    echo '<div class="imagens"><img src="uploads/' . $row['imagem_principal'] . '" alt="Imagem da Notícia"></div>';
                    echo '<p class="texto-noticia">' . $row['conteudo'] . '</p>';
                } else {
                    echo '<p>Notícia não encontrada.</p>';
                }
                $conn->close();
            }
            ?>
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
</body>
</html>
