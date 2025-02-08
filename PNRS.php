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

    <!-- Conteúdo da página -->
    <div class="pagina">
    <div class="conteudo">
        
        <h1 class="titulo-conteudo">O que é a Política Nacional de Resíduos Sólidos?</h1>

        <hr class="divisao">

        <p>A <b>Política Nacional de Resíduos Sólidos (PNRS)</b> é uma lei (Lei N° 12.305) que visa diminuir o impacto ambiental, estabelecer princípios, objetivos e diretrizes para a gestão e gerenciamento adequado dos resíduos sólidos no Brasil.</p>

        <div class="imagens">
            <img src="img_pnrs/lixo.png" alt="">
        </div>

        <h2 class="topico-conteudo">Princípios</h2>

        <p>A PNRS é baseada em um conjunto de princípios que orientam a gestão de resíduos sólidos no país. Esses princípios são a base para o desenvolvimento e implementação de políticas, planos, programas e ações relacionadas aos resíduos sólidos.</p>
        <p>Os 10 princípios da PNRS são:</p>

        <ul class="lista">
            <li><b>Prevenção e precaução:</b> A gestão de resíduos sólidos deve priorizar a prevenção e a precaução, a fim de evitar a geração de resíduos e minimizar os riscos à saúde pública e ao meio ambiente;</li>
            <li><b>Poluidor-pagador e protetor-recebedor:</b> Estabelece que os poluidores devem arcar com os custos das medidas de prevenção, controle e remediação dos impactos ambientais, enquanto os protetores do meio ambiente devem ser beneficiados por suas ações;</li>
            <li><b>Desenvolvimento sustentável:</b> A gestão de resíduos sólidos deve ser baseada nos princípios do desenvolvimento sustentável, buscando equilibrar aspectos ambientais, sociais e econômicos;</li>
            <li><b>Ecoeficiência:</b> A gestão de resíduos sólidos deve promover a ecoeficiência, buscando o máximo de resultados com o mínimo de impacto ambiental e o uso racional dos recursos naturais;</li>
            <li><b>Cooperação entre os entes federados:</b> A gestão de resíduos sólidos deve ser realizada de forma cooperativa entre a União, os estados, o Distrito Federal e os municípios, garantindo a eficiência e a efetividade das ações e políticas públicas;</li>
            <li><b>Responsabilidade compartilhada pelo ciclo de vida dos produtos:</b> A gestão de resíduos sólidos deve envolver todos os agentes da cadeia produtiva (fabricantes, importadores, distribuidores, comerciantes, consumidores e titulares dos serviços públicos de limpeza urbana e manejo de resíduos sólidos) na responsabilidade pelo gerenciamento dos resíduos gerados;</li>
            <li><b>Direito à informação e participação social:</b> A gestão de resíduos sólidos deve garantir o acesso à informação e a participação da sociedade no processo de tomada de decisão, promovendo a transparência e o controle social das políticas públicas;</li>
            <li><b>Equidade intergeracional:</b> A gestão de resíduos sólidos deve considerar as necessidades das gerações presentes e futuras, buscando garantir a qualidade de vida e a preservação do meio ambiente para as futuras gerações;</li>
            <li><b>Integração de políticas e ações:</b> A gestão de resíduos sólidos deve ser integrada às demais políticas públicas, como saúde, meio ambiente, educação, recursos hídricos e desenvolvimento urbano, garantindo ações coordenadas e eficientes;</li>
            <li><b>Capacidade de sustentação dos ecossistemas:</b> A gestão de resíduos sólidos deve respeitar a capacidade de sustentação dos ecossistemas, evitando a sobrecarga e a degradação ambiental.</li>
        </ul>

        <h2 class="topico-conteudo">Objetivos</h2>

        <p>A PNRS estabelece vários objetivos e metas que procuram melhorar a forma como os resíduos são tratados no país. Seus principais objetivos incluem:</p>

        <ul class="lista">
            <li><b>Proteção da saúde pública e do meio ambiente:</b> Garantir a disposição final ambientalmente adequada dos resíduos sólidos, minimizando os impactos negativos à saúde das pessoas e ao meio ambiente;</li>
            <li><b>Redução da geração de resíduos:</b> Estimular a redução da quantidade de resíduos gerados, promovendo ações de conscientização e práticas de consumo sustentável;</li>
            <li><b>Reutilização e reciclagem:</b> Incentivar a reutilização e a reciclagem dos resíduos, buscando diminuir a quantidade de resíduos destinados à disposição final e valorizando os materiais recicláveis;</li>
            <li><b>Responsabilidade compartilhada:</b> Estabelecer a responsabilidade compartilhada pelo ciclo de vida dos produtos entre fabricantes, importadores, distribuidores, comerciantes, consumidores e titulares dos serviços públicos de limpeza urbana e manejo de resíduos sólidos, visando uma gestão sustentável dos resíduos;</li>
            <li><b>Inclusão social e geração de emprego e renda:</b> Integrar e valorizar a atuação dos catadores de materiais recicláveis no sistema de gestão de resíduos sólidos, promovendo a inclusão social e a geração de emprego e renda para esses trabalhadores;</li>
            <li><b>Desenvolvimento de tecnologias limpas:</b> Fomentar o desenvolvimento de tecnologias limpas e sustentáveis no gerenciamento dos resíduos sólidos, buscando soluções inovadoras e eficientes;</li>
            <li><b>Articulação entre os entes federados:</b> Estimular a cooperação entre a União, os estados, o Distrito Federal e os municípios na elaboração e implementação de planos e ações relacionados à gestão de resíduos sólidos, garantindo um planejamento integrado e eficiente;</li>
            <li><b>Educação ambiental:</b> Promover ações de educação ambiental voltadas à conscientização da população sobre a importância da correta gestão dos resíduos sólidos e do consumo sustentável.</li>
        </ul>

        <h2 class="topico-conteudo">Diretrizes</h2>

        <p>As diretrizes da Política Nacional de Resíduos definem as bases da regulamentação do setor de resíduos. Entre as principais estão a ordem de prioridade e a definição de responsabilidades na gestão dos resíduos sólidos, conforme demonstrado a seguir:</p>

        <p><b><i>Lei 12.305/2010 Art. 9°:</b> Na gestão e gerenciamento de resíduos sólidos, deve ser observada a seguinte ordem de prioridade: não geração, redução, reutilização, reciclagem, tratamento dos resíduos sólidos e disposição final ambientalmente adequada dos rejeitos.</i></p>

        <ol class="lista">
            <li><i>Poderão ser utilizadas tecnologias visando à recuperação energética dos resíduos sólidos urbanos, desde que tenha sido comprovada sua viabilidade técnica e ambiental e com a implantação de programa de monitoramento de emissão de gases tóxicos aprovado pelo órgão ambiental;</i></li>
            <li><i>A Política Nacional de Resíduos Sólidos e as Políticas de Resíduos Sólidos dos Estados, do Distrito Federal e dos Municípios serão compatíveis com o disposto no caput e no § 1° deste artigo e com as demais diretrizes estabelecidas nesta Lei.</i></li>
        </ol>

        <h2 class="topico-conteudo">Conclusão</h2>

        <p>Em suma, A PNRS é uma importante medida para a gestão ambiental e para a construção de uma sociedade mais sustentável e responsável com seus resíduos. A implementação da política requer ações integradas e o envolvimento de todos os setores da sociedade, desde o governo até os consumidores finais.</p>

        <a class="link-pagina" href="http://www.planalto.gov.br/ccivil_03/_ato2007-2010/2010/lei/l12305.htm">Confira a Lei n° 12.305/2010 na íntegra</a>

    </div>
    </div>

    <!-- Botão pra voltar ao topo-->
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

<script>
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