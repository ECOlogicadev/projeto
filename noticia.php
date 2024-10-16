<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="paginas.css">

    <!-- Ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Teste ECO</title>
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
    <div class="conteudo">
        
    <h1 class="titulo-conteudo">Derramamento de Óleo na Costa Brasileira</h1>

    <hr class="divisao">

    <p class="info-noticia">Por: John Doe | Publicado em 20 de Outubro de 2023</p>

    <div class="imagens">
        <img src="img_noticia/oleo.jpg" alt="">
    </div>

      <p class="texto-noticia">
        Na manhã de hoje, autoridades ambientais confirmaram a ocorrência de um derramamento de óleo na costa brasileira. O incidente ocorreu a aproximadamente 50 quilômetros da cidade de Recife, no estado de Pernambuco. As equipes de resgate e limpeza já estão mobilizadas para enfrentar o desafio de conter a propagação do óleo e minimizar os impactos ambientais.<br><br>

        O derramamento de óleo, de origem ainda desconhecida, está se espalhando rapidamente e ameaçando a vida marinha e as áreas costeiras. A Capitania dos Portos e o Instituto Brasileiro do Meio Ambiente e dos Recursos Naturais Renováveis (IBAMA) estão coordenando esforços para conter a situação.

        Ainda não se sabe a extensão total do derramamento, mas especialistas estão monitorando a área e avaliando os danos ambientais. As praias próximas à área afetada já estão sendo fechadas para evitar qualquer contato com o óleo.<br><br>

        As autoridades pedem a colaboração da população e dos voluntários para ajudar na limpeza das praias e no resgate da fauna afetada. Estima-se que centenas de animais marinhos já tenham sido afetados pelo derramamento.<br><br>

        A investigação sobre a causa do derramamento de óleo está em andamento, e medidas para evitar futuros incidentes desse tipo estão sendo discutidas. Esta situação serve como um lembrete da importância da preservação do meio ambiente e da necessidade de regulamentações mais rigorosas para a indústria de petróleo.

        Fique atento às atualizações desta notícia, pois mais informações serão divulgadas à medida que estiverem disponíveis. A comunidade global está monitorando a situação com preocupação e esperando uma rápida resolução para minimizar os danos ambientais.<br><br>
      </p>
  
          <p id = "rodape">A investigação sobre a causa do derramamento de óleo está em andamento, e medidas para evitar futuros incidentes desse tipo estão sendo discutidas. Esta situação serve como um lembrete da importância da preservação do meio ambiente e da necessidade de regulamentações mais rigorosas para a indústria de petróleo.<br><br>
  
          Fique atento às atualizações desta notícia, pois mais informações serão divulgadas à medida que estiverem disponíveis. A comunidade global está monitorando a situação com preocupação e esperando uma rápida resolução para minimizar os danos ambientais.
        </p>
    </div>

    <div class="lateral">

        <i class="bx bx-dots-vertical"></i>
        <h2 class="topico-conteudo">Confira também</h2>
    
        <div class="link-lateral">
            <img src="img_noticia/maranhao.jpg" alt="">
            <h3> Maranhão avança na coleta de lixo, mas continua na última posição nacional</h3>
            <p>Maranhão tem a menor proporção de coleta de lixo do país com 69,8%.</p>
        </div>
    
        <div class="link-lateral">
            <img src="img_noticia/sacavem.jpg" alt="">
            <h3>Lixo é descartado de forma irregular na Avenida dos Africanos, em São Luís</h3>
            <p>Quantidade enorme de lixo descartado no bairro do Sacavém.</p>
        </div>
    
        <div class="link-lateral">
            <img src="img_noticia/entrevista.jpg" alt="">
            <h3>Programa ‘Sustentabilidade na Prática’ destaca ações do programa Lixo Zero no Maranhão</h3>
            <p>Geóloga Cláudia Martins explora educação ambiental e reaproveitamento de resíduos sólidos em entrevista na Rádio Assembleia.</p>
        </div>
    
        <div class="link-lateral">
            <img src="img_noticia/documentario.jpg" alt="">
            <h3>Mar de Lixo: estreia estadual do premiado filme documental maranhense acontece no Cinema Sesc</h3>
            <p>Documentário “Mar de Lixo” apresenta crise ambiental e promove conscientização em exibições gratuitas em São Luís e Imperatriz</p>
        </div>
    </div>
    </div>
        <!-- Botão pra voltar ao topo-->
        <a class="topbtn" href="#"><i class="bx bxs-chevron-up"></i></a>
    
        <!-- Rodapé-->
        <footer class="footer">
        
            <div class="footer-left">
          
                <h3>ECOlógica</h3>
          
                <p class="footer-links">
                    <a href="home.html" class="link-1">Home</a>
                    <a href="sobre.html">Sobre</a>
                    <a href="#">Faq</a>
                    <a href="#">Contato</a>
                </p>
          
                <p class="footer-company-name">ECOlógica © 2023 - 2024</p>
            </div>
          
            <div class="footer-center">
          
                <div>
                    <i class="bx bxs-map"></i>
                    <p><span> Rodovia MA 201, Km 12 - Vila Piçarreira</span> São José de Ribamar - MA</p>
                </div>
          
                <div>
                    <i class="bx bxs-phone"></i>
                    <p>+99 99999-9999</p>

                </div>
                
          
                <div>
                    <i class="bx bxl-gmail"></i>
                    <p><a href="mailto:ecologica.ini@gmail.com">ecologica.ini@gmail.com</a></p>
                </div>
          
            </div>
          
            <div class="footer-right">
          
                <p class="footer-company-about">
                    <span>Sobre nós</span>
                    A <b>ECOlógica</b> é uma plataforma digital que promove a consciência ambiental e a sustentabilidade.
                </p>
          
                <div class="footer-icons">
          
                <a href="#"><i class="bx bxl-instagram-alt"></i></a>
                <a href="#"><i class="bx bxl-twitter"></i></a>
          
            </div>
        </div>
    </footer>
  <!--JS-->
  <link href="app.js">
</body>
</html>