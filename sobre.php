<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="sobre.css">
    
    <script src="app.js" defer></script>

    <!-- Ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>teste</title>
</head>

<body>
    <!-- Cabeçalho -->
    <nav>

        <!-- Logo -->
        <div class="nav-bar">
            <div class="logo-cabecalho"><a href="home.html"><img src="logos/logo.jpg"></a></div>

            <!-- Páginas destacadas -->
            <div class="menu">
                <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                    <li><a href="residuos.php">Tipos de Resíduos</a></li>
                    <li><a href="PNRS.php">PNRS</a></li>
                    <li><a href="cooperativas.php">Cooperativas</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                </ul>
            </div>

            <!-- Área de Pesquisa-->
            <div class="searchBox">
                <div class="search-field">
                    <input type="text" placeholder="Buscar">
                    <i class="bx bx-search search"></i>
                </div>
            </div>
            
            <!-- Área do Usuário -->
            <div class="user">
                <div class="user-container">
                    <?php if (isset($_SESSION['nome'])): ?>
                        <!-- Se o usuário estiver logado, exibe o nome e o botão de logout -->
                        <span><?php echo $_SESSION['nome']; ?></span>
                        <button class="modal-button" onclick="window.location.href='logout.php'">Logout </button>
                    <?php else: ?>
                        <!-- Se o usuário não estiver logado, exibe o modal de login/cadastro -->
                        <button class="session"><i class='bx bxs-user'></i></button>
                        <div class="user-modal">
                            <p>O que você gostaria de fazer?</p>
                            <button class="modal-button" onclick="window.location.href='login.html'">Login</button>
                            <button class="modal-button" onclick="window.location.href='cadastro.html'">Cadastro</button>
                           
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    </nav>
    <!-- Conteúdo da página -->
    <div class="pagina">

        <div class="topo_pag">
            <img class="fundo" src="img_sobre/fundo.png" alt="">
        </div>

        <div class="titulo">Bem vindo à ECOlógica</div>
        <div class="slogan">Sua fonte de informação verde</div>

        <div class="conteudo">

            <div class="texto">
                <h2 class="topico-conteudo">Sobre nós</h2>
                <p>A ECOlógica é uma iniciativa dedicada a promover a conscientização ambiental e a educação sustentável.</p>
                <p>Nosso principal objetivo é ser uma fonte confiável de conhecimento e informação para aqueles que se interessam pelas temáticas ambientais.</p>
            </div>

            <div class="texto">
                <h2 class="topico-conteudo">Nossa motivação</h2>
                <p>A motivação por trás da criação da ECOlógica é a crescente preocupação com as questões ambientais e a necessidade de conscientizar a população sobre a importância da sustentabilidade e da reciclagem.</p>
                <p>Acreditamos que a informação é uma ferramenta poderosa para promover mudanças positivas e queremos capacitar as pessoas com o conhecimento necessário para tomar decisões conscientes em relação ao meio ambiente.</p>
            </div>

        </div>
    </div>

    <!-- Botão pra voltar ao topo-->
    <a class="topbtn" href="#"><i class="bx bxs-chevron-up"></i></a>

    <!-- Rodapé-->
    <footer class="footer">

        <div class="footer-left">
  
          <h3>ECOlógica</h3>
    
        <!-- Links Úteis -->
          <p class="footer-links">
            <a href="home.html" class="link-1">Home</a>
            <a href="sobre.html">Sobre</a>
            <a href="#">Faq</a>
            <a href="#">Contato</a>
          </p>
        
        <!-- Anos de atividade da ECOlógica -->
          <p class="footer-company-name">ECOlógica © 2023 - 2024</p>
        </div>
  
        <div class="footer-center">

        <!-- Endereço -->
          <div>
            <i class="bx bxs-map"></i>
            <p><span> Rodovia MA 201, Km 12 - Vila Piçarreira</span> São José de Ribamar - MA</p>
          </div>
  
        <!-- Telefone para Contato -->
          <div>
            <i class="bx bxs-phone"></i>
            <p>+99 99999-9999</p>
          </div>
  
        <!-- Email para contato -->
          <div>
            <i class="bx bxl-gmail"></i>
            <p><a href="mailto:ecologica.ini@gmail.com">ecologica.ini@gmail.com</a></p>
          </div>
        </div>
        
        <div class="footer-right">

        <!-- Sobre nós -->
          <p class="footer-company-about">
            <span>Sobre nós</span>
            A <b>ECOlógica</b> é uma plataforma digital que promove a consciência ambiental e a sustentabilidade.
          </p>
          
        <!-- Redes sociais -->
          <div class="footer-icons">
            
            <!-- Instagram -->
            <a href="#"><i class="bx bxl-instagram-alt"></i></a>

            <!-- Twitter -->
            <a href="#"><i class="bx bxl-twitter"></i></a>

          </div>
        </div>
    </footer>
   