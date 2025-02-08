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
        <h1 class="titulo-conteudo">Quais são os principais tipos de resíduos sólidos?</h1>

        <hr class="divisao">

        <p>Nossa sociedade moderna enfrenta um desafio crescente: <b>a gestão responsável dos resíduos sólidos</b>. O impacto ambiental e as implicações para a saúde pública tornam essencial entender como o lixo que geramos afeta o nosso mundo. <br><br>Nesta matéria, vamos explorar os principais tipos de resíduos sólidos e sua importância para a ecologia e para a reciclagem.</p>

        <h2 class="topico-conteudo">1. Resíduos Domésticos</h2>

        <div class="imagens">
            <img src="img_categorias/lixo-domestico.png" alt="">
        </div>

        <p>É o tipo mais comum de resíduo, gerado em nossas casas no dia a dia. Composto por restos de alimentos, embalagens, papel higiênico, plásticos e vidro, os resíduos domésticos podem ser reciclados e reduzidos por meio de práticas conscientes de consumo.</p>
        <p>O destino adequado para o lixo domiciliar varia de acordo com as políticas e práticas de gestão de resíduos da região em que você vive. No entanto, geralmente, existem três opções principais para o destino do lixo domiciliar:</p>

        <ul class="lista">
            <li><b>Coleta e Destino em Aterro Sanitário:</b> Em um aterro sanitário, o lixo é depositado em camadas e coberto diariamente com terra ou material semelhante para minimizar o odor, reduzir a proliferação de pragas e evitar a contaminação do solo e da água subterrânea.</li>
            <li><b>Reciclagem:</b> Os programas de reciclagem geralmente envolvem a separação desses materiais na fonte (ou seja, em sua casa) e sua coleta separada para processamento em instalações de reciclagem. Esses materiais reciclados são transformados em novos produtos.</li>
            <li><b>Compostagem:</b>  Os resíduos orgânicos, como restos de alimentos, cascas de frutas e vegetais, podem ser compostados. A compostagem é um processo em que esses materiais são decompostos naturalmente para criar adubo orgânico rico em nutrientes.</li>
        </ul>

        <h2 class="topico-conteudo">2. Resíduos Comerciais</h2>

        <div class="imagens">
            <img src="img_categorias/lixo-comercial.png" alt="">
        </div>

        <p>Originários de estabelecimentos comerciais e de serviços, esses resíduos incluem embalagens, papel de escritório, caixas de papelão e restos de alimentos. Empresas estão adotando cada vez mais a reciclagem como parte de sua responsabilidade social corporativa.</p>
        <p>Algumas maneiras de diminuir a quantidade de lixo comercial são:</p>

        <ul class="lista">
            <li><b>Dar preferência a produtos em refil:</b> Optar por embalagens reutilizáveis ou a granel sempre que possível, reduzindo a necessidade de embalagens descartáveis.</li>
            <li><b>Promover a digitalização:</b> Transferir documentos e comunicações para formatos digitais para reduzir o uso de papel e toner de impressora.</li>
        </ul>

        <h2 class="topico-conteudo">3. Resíduos Industriais</h2>

        <div class="imagens">
            <img src="img_categorias/lixo-industrial.png" alt="">
        </div>

        <p>Gerados em processos industriais, esses resíduos podem ser não perigosos, como restos de produção, ou perigosos, como substâncias químicas tóxicas. O tratamento adequado é fundamental para prevenir danos ambientais.</p>
        <p>Cada indústria produz determinado tipo de lixo. Sendo assim, o lixo industrial pode contemplar madeiras, vidros, plásticos, metais, dentre outros.</p>
        <p>Como descartar adequadamente os resíduos industriais:</p>

        <ul class="lista">
            <li><b>Reciclagem e reuso:</b> Deve-se priorizar a reciclagem ou o reuso de materiais sempre que possível, reduzindo a quantidade de resíduos destinados à disposição final.</li>
            <li><b>Incineração controlada:</b> Caso necessário, podem ser utilizados incineradores controlados para eliminar resíduos perigosos, obedecendo aos padrões de emissão.</li>
            <li><b>Redução na fonte:</b> Promover práticas de produção mais limpas e eficientes para reduzir a geração de resíduos desde o início do processo.</li>
            <li><b>Aterros sanitários especiais:</b> Enviar resíduos não recicláveis para aterros sanitários projetados para lidar com materiais industriais.</li>
        </ul>

        <h2 class="topico-conteudo">4. Resíduos Hospitalares</h2>

        <div class="imagens">
            <img src="img_categorias/lixo-hospitalar.png" alt="">
        </div>

        <p>Proveniente de estabelecimentos que oferecem cuidados médicos, esse tipo de resíduo engloba todos os tipos de instrumentos utilizados durante o atendimento a pacientes, como agulhas, lâminas, medicamentos e luvas.</p>
        <p>O manuseio seguro é crucial para evitar riscos à saúde pública, são exemplos:</p>

        <ul class="lista">
            <li><b>Incineração:</b> O destino mais comum para tratamento do lixo hospitalar é a incineração, onde empresas são terceirizadas para cuidar dos resíduos. Entretanto, essa prática pode ser perigosa, pois as cinzas liberadas podem conter substâncias nocivas à atmosfera.</li>
            <li><b>Esterilização:</b> A esterilização é uma alternativa válida que reduz o potencial ofensivo dos resíduos infectantes. No entanto, o seu elevado custo faz com que seja pouco utilizada.</li>
        </ul>

        <h2 class="topico-conteudo">5. Resíduos Químicos</h2>

        <div class="imagens">
            <img src="img_categorias/lixo-quimico.png" alt="">
        </div>

        <p>São constituídos por aqueles materiais que representam riscos substanciais para a saúde e o ambiente devido às suas propriedades químicas ou físicas. Produtos como pilhas, termômetros, baterias, agrotóxicos e tintas são exemplos.</p>
        <p>Os resíduos químicos, também chamados de resíduos tóxicos, podem ser descartados através da:</p>

        <ul class="lista">
            <li><b>Rotulação e classificação:</b> Através da classificação e rotulação adequada, pode-se evitar que produtos incompatíveis sejam misturados e que seja feito o descarte errado.</li>
            <li><b>Entrega dos produtos a empresas especializadas:</b>  Para resíduos perigosos ou complexos, deve ser considerada a entrega a empresas especializadas em gerenciamento de resíduos químicos.</li>
        </ul>

        <h2 class="topico-conteudo">6. Resíduos Eletrônicos</h2>

        <div class="imagens">
            <img src="img_categorias/lixo-eletronico.png" alt="">
        </div>

        <p>Os resíduos eletrônicos ou tecnológicos, como o próprio nome indica, são provenientes de produtos eletrônicos, como celulares, computadores, impressoras, e televisores. são compostos de materiais como ouro, cobre e metais pesados.</p>
        <p>Com o avanço da tecnologia, há um excesso de lixo eletrônico no mundo, o que pode causar diversos impactos negativos para o meio ambiente.</p>
        <p>A <a class="link-pagina" href="PNRS.php"><b>Política Nacional de Resíduos Sólidos</b></a> diz que as empresas fabricantes devem se responsabilizar pelo descarte do lixo eletrônico. Portanto, você pode entrar em contato com os fabricantes dos aparelhos para descobrir como devolver esses resíduos.</p>

        <h2 class="topico-conteudo">Conclusão</h2>

        <p>A gestão adequada dos resíduos sólidos é crucial para a preservação do meio ambiente e a promoção da sustentabilidade. A reciclagem, a reutilização e a redução da geração de resíduos são estratégias essenciais para enfrentar esses desafios e criar um futuro mais limpo e ecológico. À medida que continuamos a pesquisar e estudar a ecologia, podemos tomar medidas concretas em direção a um mundo mais sustentável.</p>
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