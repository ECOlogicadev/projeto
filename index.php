<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOlógica</title>

    <!-- CSS -->
    <link rel="stylesheet" href="home.css">

    <!-- Ícones -->
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

    <!-- Carrossel de Notícias -->
    <h1 class="titulo-carrossel">Em destaque</h1>

    <div class="carrossel">
        <i class='bx bxs-left-arrow prev'></i>
        <i class='bx bxs-right-arrow next'></i>

        <div class="conteudo">
            <?php
            // Conexão com o banco de dados
            $conn = new mysqli('localhost', 'root', '', 'ecologica');
            if ($conn->connect_error) {
                die('Erro na conexão: ' . $conn->connect_error);
            }

            $sql = "SELECT id, titulo, subtitulo, imagem_principal FROM noticias WHERE em_destaque = 1 ORDER BY data_criacao DESC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="noticia">';
                    echo '<a href="noticia.php?id=' . $row['id'] . '"><img src="uploads/' . $row['imagem_principal'] . '" alt="" class="img-noticia"></a>';
                    echo '<div class="info-noticia">';
                    echo '<p><a href="noticia.php?id=' . $row['id'] . '">' . $row['titulo'] . '</a></p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nenhuma notícia em destaque.</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Publicações Recentes -->
    <h1 class="titulo-noticias">Publicações recentes</h1>

    <div class="main">
    <?php
    // Exibindo as últimas publicações
    $conn = new mysqli('localhost', 'root', '', 'ecologica');
    if ($conn->connect_error) {
        die('Erro na conexão: ' . $conn->connect_error);
    }

    $sql = "SELECT id, titulo, subtitulo, imagem_principal FROM noticias ORDER BY data_criacao DESC LIMIT 6";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="noticia.php?id=' . $row['id'] . '">';
            echo '<div class="cards">';
            echo '<img src="uploads/' . $row['imagem_principal'] . '" alt="Imagem da Notícia">';
            echo '<div class="texto">';
            echo '<h4>' . $row['titulo'] . '</h4>';
            echo '<p>' . $row['subtitulo'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
        }
    } else {
        echo '<p>Nenhuma publicação recente.</p>';
    }
    $conn->close();
    ?>

</div>

    <!-- Botão para voltar ao topo-->
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

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Script do carrossel Slick -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.conteudo').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            nextArrow: $('.next'),
            prevArrow: $('.prev'),
        });

        // Script do modal de login do usuario
        var modal = document.getElementById("userModal");
        var btn = document.getElementById("userButton");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
