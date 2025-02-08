<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="paginas.css".css>

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

        <h1 class="titulo-conteudo">Cooperativas e Empresas de Reciclagem no Maranhão</h1>

        <hr class="divisao">

        <h2 class="topico-conteudo">São Luís</h2>

        <table style="width:100%">
            <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Resíduo recebido</th>
            </tr>

            <tr>
                <td><b>COOPVILA</b> — Cooperativa de Trabalho, Coleta e Recuperação de Resíduos da Vila Maranhão</td>
                <td>(98) 98888-3001 / 98780-2812 <a href='https://www.instagram.com/coopvila/'><button>Instagram</button></a></td>
                <td>Rua da Vala, Nº 169. Vila Maranhão.</td>
                <td>Resíduos de madeira.</td>
            </tr>

            <tr>
                <td><b>ASCAMAR</b> — Associação de Catadores de Materiais Recicláveis</td>
                <td>(98) 98923-9312 <a href='https://www.instagram.com/ascamar_slz/'><button>Instagram</button></a></td>
                <td>Rua São Pantaleão, Nº 1094. Madre Deus.</td>
                <td>Embalagens longa-vida, papel branco, metais, plástico.</td>
            </tr>

            <tr>
                <td><b>COOMARCO</b> — Cooperativa de Catadores de Materiais Recicláveis da Cidade Operária</td>
                <td>(98) 98724-2377</td>
                <td>Rua da Vitória, quadra 128, Nº 03. Cidade Olímpica.</td>
                <td>Embalagens longa-vida, metais, plástico.</td>
            </tr>

            <tr>
                <td><b>AMREVIMA</b> — Associação das Mulheres Recicladoras de Vidro do Maranhão</td>
                <td>(98) 98843-6660 / 98814-6590 / 98843-2039</td>
                <td>Avenida Cônego Ribamar Carvalho, Nº 04. Sá Viana.</td>
                <td>Garrafas de vidro em geral.</td>
            </tr>

            <tr>
                <td><b>COMTRABB</b> — Cooperativa de Mulheres Trabalhadoras da Bacia do Bacanga</td>
                <td>(98) 99963-5830 / 98844-5833</td>
                <td>Rua Cobalto, Quadra 54, Nº 03. Coroado.</td>
                <td>Resíduos não perigosos.</td>
            </tr>

            <tr>
                <td><b>COOPGEST</b> — Cooperativa de Gestão de Resíduos Sólidos da Microrregião do Anjo da Guarda</td>
                <td>(98) 98805-3402</td>
                <td>Rua Bolívia, Quadra 18, Nº 36. Anjo da Guarda.</td>
                <td>Papel, papelão, plástico.</td>
            </tr>

            <tr>
                <td><b>COOPRESL</b> — Cooperativa de Reciclagem de São Luís</td>
                <td>(98) 98771-5675 <a href='https://www.instagram.com/coopreslma/'><button>Instagram</button></a></td>
                <td>Av. dos Portugueses, 1966. Campus da UFMA. Vila Bacanga.</td>
                <td>Papel, plásticos, metais.</td>
            </tr>

            <tr>
                <td><b>Depósito de papelão Muscapel</b></td>
                <td>(98) 3223-3462</td>
                <td>Rua Tupiniquins, 136, João Paulo.</td>
                <td>Papel, plástico, papelão.</td>
            </tr>

            <tr>
                <td><b>GRD</b> — Gestão em Resíduos Tecnológicos</td>
                <td>(98) 98869-1510 / 8158-8158 <a href='http://gervasreciclagemdigital.com.br/'><button>Plataforma</button></a></td>
                <td>Av. Norte Interna, S/N. Cidade Operária.</td>
                <td>Resíduos eletrônicos, metálico, ferroso e não ferroso.</td>
            </tr>

            <tr>
                <td><b>LIMA METAIS</b></td>
                <td>(98) 3276-0932 <a href='https://www.limametais.com.br/lm/'><button>Plataforma</button></a></td>
                <td>Br. 135 — Km 13, Nº 40. Pedrinhas.</td>
                <td>Sucata metálica ferrosa.</td>
            </tr>

            <tr>
                <td><b>OLEAMA</b></td>
                <td>(98) 3217-3900</td>
                <td>Av. Engenheiro Emiliano Macieira, 3715 — Km 05. Tirirical.</td>
                <td>Óleo de cozinha usado.</td>
            </tr>

            <tr>
                <td><b>RECIMAR</b> — Reciclagem Maranhão</td>
                <td>(98) 3241-7193 / 3241-9074 <a href='https://www.recimarreciclagem.com.br/'><button>Plataforma</button></a></td>
                <td>Rua St Antônio, 659. Tibiri.</td>
                <td>Papel, plásticos, metais.</td>
            </tr>

            <tr>
                <td><b>RIPEL RECICLAGEM</b></td>
                <td>(98) 3258-2904 <a href='https://ripelreciclagem.com.br/'><button>Plataforma</button></a></td>
                <td>Rua Adelman Correia, 200. Anil.</td>
                <td>Embalagens longa-vida, metais, papel branco, plástico.</td>
            </tr>

            <tr>
                <td><b>Depósito O Garrafeiro</b></td>
                <td>(98) 98803-6922 / 3247-0089</td>
                <td>Av. Este Externa, 103, Cidade Operária.</td>
                <td>Garrafas de vidro e plástico.</td>
            </tr>
        </table>

        <h2 class="topico-conteudo">Paço do Lumiar</h2>

        <table style="width:100%">
        <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Resíduo recebido</th>
            </tr>

            <tr>
                <td><b>COOPCARE</b> — Cooperativa de Catadores de Materiais Recicláveis de Paço do Lumiar</td>
                <td>(98) 98701-1465</td>
                <td>Rua da Fábrica, 18. Iguaíba.</td>
                <td>Resíduos não perigosos.</td>
            </tr>

            <tr>
                <td><b>INDAMA</b> — Indústria de Derivados de Animais do Maranhão</td>
                <td>(98) 3274-1145 / 3274-1237 / 98789-2135  <a href='https://www.indama.com.br/empresa'><button>Plataforma</button></a></td>
                <td>Rua Itatuaba, 10. Iguaíba.</td>
                <td>Oléo de cozinha.</td>
            </tr>
        </table>
                
        <h2 class="topico-conteudo">São José de Ribamar</h2>

        <table style="width:100%">
        <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Resíduo recebido</th>
            </tr>
    
            <tr>
                <td><b>COCAMAR</b> — Cooperativa de Catadores de São José de Ribamar</td>
                <td>(98) 98823-1712 / 98783-8212  <a href='https://www.cocamar.com.br/'><button>Plataforma</button></a></td>
                <td>Rua do Campo, 03. Mutirão.</td>
                <td>Garrafas PET, ferro e alumínio.</td>
            </tr>
        </table>

        <h2 class="topico-conteudo">Imperatriz</h2>

        <table style="width:100%">
        <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Resíduo recebido</th>
            </tr>
    
            <tr>
                <td><b>ASCAMARI</b> — Associação dos Catadores de Materiais Recicláveis de Imperatriz</td>
                <td>(99) 99169-4912</td>
                <td>Avenida Cacauzinho. Recanto Universitário.</td>
                <td>Embalagens longa-vida, metais, plásticos.</td>
            </tr>
        </table>

        <h2 class="topico-conteudo">Barra do Corda</h2>

        <table style="width:100%">
        <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Resíduo recebido</th>
            </tr>
    
            <tr>
                <td><b>COOLIBE</b> — Cooperativa Mista dos Catadores de Lixo para Reciclagem de Barra do Corda</td>
                <td>(99) 3643-4939 / 98102-8541 / 98160-6816</td>
                <td>Av. Governadora Roseana Sarney, 477. Trizidela.</td>
                <td>Resíduos não perigosos de origem doméstica.</td>
            </tr>
        </table>

        <h2 class="topico-conteudo">Riachão</h2>

        <table style="width:100%">
            <tr>
            <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Endereço</th>
                <th>Resíduo recebido</th>
            </tr>
    
            <tr>
                <td><b>Associação de Catadores de Materiais Recicláveis de Riachão</b></td>
                <td>(99) 98841-0925</td>
                <td>Av. Santos Dumont, S/N. Centro.</td>
                <td>Baterias, embalagens longa-vida, embalagens de óleo lubrificante, metal, papel e plástico.</td>
            </tr>
        </table>
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

