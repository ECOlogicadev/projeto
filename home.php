<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="home.css">

    <!-- Ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Teste ECO</title>
</head>

<body>
    <!-- Cabeçalho -->
    <nav>
        <div class="nav-bar">
            <div class="logo-cabecalho"><a href="home.php"><img src="logos/logo.jpg"></a></div>

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
                        <button class="modal-button" onclick="window.location.href='logout.php'">Logout</button>
                        <?php if (isset($_SESSION['fkPerfil']) && $_SESSION['fkPerfil'] == 1): ?>
                            <!-- Se o usuário for admin, exibe o botão de controle de acesso -->
                            <button class="modal-button" onclick="window.location.href='controle_acesso.php'">Controle de Acesso</button>
                        <?php endif; ?>
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

    </nav>
    
    <!-- Carrossel de Notícias -->
    <h1 class="titulo-carrossel"> Em destaque</h1>

    <div class="carrossel">

        <!-- Ícones de voltar e avançar -->
        <i class='bx bxs-left-arrow prev'></i>
        <i class='bx bxs-right-arrow next'></i>

        <div class="conteudo">

            <!-- Notícia 1 -->
            <div class="noticia">
                <a href="noticia.html"><img src="img_home/lixao.jpg" alt="" class="img-noticia"></a>
                <div class="info-noticia">
                    <p><a href="noticia.html">Lixo — Um desafio para a preservação do meio ambiente</a></p>
                </div>
            </div>

            <!-- Notícia 2 -->
            <div class="noticia">
                <a href="noticia.html"><img src="img_home/brasil.jpg" alt="" class="img-noticia"></a>
                <div class="info-noticia">
                    <p><a href="noticia.html">Brasil é o quinto maior produtor de lixo eletrônico no mundo</a></p>
                </div>
            </div>

            <!-- Notícia 3 -->
            <div class="noticia">
                <a href="noticia.html"><img src="img_home/reciclagem_carrosel.jpg" alt="" class="img-noticia"></a>
                <div class="info-noticia">
                    <p><a href="noticia.html">Reciclagem — Importância e os impactos no meio ambiente</a></p>
                </div>
            </div>

            <!-- Notícia 4 -->
            <div class="noticia">
                <a href="noticia.html"><img src="img_home/reciclagem_BR.jpg" alt="" class="img-noticia"></a>
                <div class="info-noticia">
                    <p><a href="noticia.html">Segundo Abrelpe, o índice de reciclagem no Brasil é de apenas 4%</a></p>
                </div>
            </div>

            <!-- Notícia 5 -->
            <div class="noticia">
                <a href="noticia.html"><img src="img_home/lixo_plastico.jpg" alt="" class="img-noticia"></a>
                <div class="info-noticia">
                    <p><a href="noticia.html">Lixo Plástico — Quais os malefícios causados e como reduzir?</a></p>
                </div>
            </div>

            <!-- Notícia 6 -->
            <div class="noticia">
                <a href="noticia.html"><img src="img_home/aterro.jpg" alt="" class="img-noticia"></a>
                <div class="info-noticia">
                    <p><a href="noticia.html"> Saiba quais as vantagens e desvantagens dos aterros sanitários</a></p>
                </div>
            </div>

        </div>
    </div>

    <!-- Publicações Recentes -->
    <h1 class="titulo-noticias">Publicações recentes</h1>

    <div class="main">

        <!-- Card 1 -->
        <div class="cards">
            <img src="img_home/homem_lixo.jpg"></a>
            <div class="texto">
                <h4>Motorista é flagrado despejando lixo próximo a rio no Olho d'Água, em São Luís</h4>
                <p>Flagrante foi feito por uma pessoa que passava pelo local.</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="cards">
            <img src="img_home/acre_lixo.jpg">
            <div class="texto">
                <h4>Acre é o segundo estado do Norte com menor cobertura de coleta de lixo por domicílio</h4>
                <p>Estado está abaixo do percentual nacional, que é de 86%. Pesquisa do IBGE mostra ainda que o Acre está em quarto lugar da região Norte no percentual de domicílios que tem a rede geral como principal fonte de abastecimento de água.</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="cards">
            <img src="img_home/salsicha.jpg">
            <div class="texto">
                <h4>Empresário joga no lixo 900 toneladas de salsicha em Roraima após Venezuela barrar exportação</h4>
                <p>Das 900 toneladas, 616 foram incineradas e as outras 284 foram descartadas no aterro sanitário de Boa Vista. Governo venezuelano barrou a entrada de alimentos brasileiros no país vizinho.</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="cards">
            <img src="img_home/prefeito.jpg">
            <div class="texto">
                <h4>Estrada rural é alvo de descarte irregular de lixo na Vila Furquim, em Presidente Prudente</h4>
                <p>Secretário municipal de Meio Ambiente, Fernando Luizari Gomes, atribuiu situação à falta de educação ambiental dos moradores.</p>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="cards">
            <img src="img_home/medicamentos.jpg">
            <div class="texto">
                <h4>Medicamentos vencidos: descarte em lixo comum pode trazer riscos à saúde e ao meio ambiente; veja como fazer</h4>
                <p>No Distrito Federal, farmácias são obrigadas por lei a receber remédios vencidos de clientes e encaminhá-los para descarte adequado. Empresa contratada pelo GDF faz coleta dos produtos, transporte e tratamento; saiba como funciona.</p>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="cards">
            <img src="img_home/teresina.jpg">
            <div class="texto">
                <h4>Prefeitura de Teresina renova contrato para coleta de lixo de forma emergencial; licitação durará 6 meses</h4>
                <p>O acordo com a empresa Litucera, que já atuava na coleta de lixo na capital, foi encerrado no sábado (9).</p>
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