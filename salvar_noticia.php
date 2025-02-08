<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
      <!-- CSS -->
   <link rel="stylesheet" href="style_php.css">

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
                        <span><?php echo " " . $_SESSION[ 'nome']. "oi"; ?></span>
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
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $conteudo = $_POST['conteudo'];

    if (isset($_FILES['imagem_principal'])) {
        $imagem_nome = $_FILES['imagem_principal']['name'];
        $imagem_tmp = $_FILES['imagem_principal']['tmp_name'];
        $imagem_destino = 'uploads/' . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_destino);
    }

    // Verificar se a checkbox "Em Destaque" foi marcada
    $em_destaque = isset($_POST['em_destaque']) ? 1 : 0;

    $conn = new mysqli('localhost', 'root', '', 'ecologica');
    if ($conn->connect_error) {
        die('Erro na conexão: ' . $conn->connect_error);
    }

    $sql = "INSERT INTO noticias (titulo, subtitulo, conteudo, imagem_principal, em_destaque, data_criacao) 
            VALUES ('$titulo', '$subtitulo', '$conteudo', '$imagem_nome', '$em_destaque', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo 'Notícia salva com sucesso!';
    } else {
        echo 'Erro: ' . $conn->error;
    }
    $conn->close();
}
?>
<p>Nada aqui por enquanto.</p>
</body>
</html>