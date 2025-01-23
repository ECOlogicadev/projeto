
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
                    <button type="submit"><i class='bx bx-search search'></i> </button>
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

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

// Funções de excluir e editar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['excluir'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM noticias WHERE id = :id");
        $stmt->execute(['id' => $id]);
        echo "<p>Notícia excluída com sucesso!</p>";
    } elseif (isset($_POST['salvar'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $conteudo = $_POST['conteudo'];

        $stmt = $pdo->prepare("UPDATE noticias SET titulo = :titulo, subtitulo = :subtitulo, conteudo = :conteudo WHERE id = :id");
        $stmt->execute([
            'id' => $id,
            'titulo' => $titulo,
            'subtitulo' => $subtitulo,
            'conteudo' => $conteudo
        ]);
        echo "<p>Notícia editada com sucesso!</p>";
    }
}

// Busca as notícias para exibição
$stmt = $pdo->query("SELECT id, titulo, subtitulo, imagem_principal FROM noticias ORDER BY id DESC");
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paginas.css">
    <title>Editar Notícias</title>
    <style>
        #editar-form {
            display: none;
            margin-top: 20px;
        }
        .noticia-imagem {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Gerenciar Notícias</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticias as $noticia): ?>
                <tr>
                    <td><?php echo htmlspecialchars($noticia['id']); ?></td>
                    <td>
                        <?php if (!empty($noticia['imagem_principal'])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($noticia['imagem_principal']); ?>" alt="Imagem da notícia" class="noticia-imagem">
                        <?php else: ?>
                            <span>Sem imagem</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($noticia['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($noticia['subtitulo']); ?></td>
                    <td>
                        <button onclick="editarNoticia(<?php echo $noticia['id']; ?>, '<?php echo addslashes($noticia['titulo']); ?>', '<?php echo addslashes($noticia['subtitulo']); ?>', '<?php echo addslashes($noticia['conteudo'] ?? ''); ?>')">Editar</button>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $noticia['id']; ?>">
                            <button type="submit" name="excluir">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="editar-form">
        <h2>Editar Notícia</h2>
        <form method="POST">
            <input type="hidden" name="id" id="editar-id">

            <label for="editar-titulo">Título:</label>
            <input type="text" name="titulo" id="editar-titulo" required>

            <label for="editar-subtitulo">Subtítulo:</label>
            <input type="text" name="subtitulo" id="editar-subtitulo" required>

            <label for="editar-conteudo">Conteúdo:</label>
            <textarea name="conteudo" id="editar-conteudo" required></textarea>

            <button type="submit" name="salvar">Salvar alterações</button>
            <button type="button" onclick="fecharFormulario()">Cancelar</button>
        </form>
    </div>

    <script>
        function editarNoticia(id, titulo, subtitulo, conteudo) {
            document.getElementById('editar-id').value = id;
            document.getElementById('editar-titulo').value = titulo;
            document.getElementById('editar-subtitulo').value = subtitulo;
            document.getElementById('editar-conteudo').value = conteudo;
            document.getElementById('editar-form').style.display = 'block';
        }

        function fecharFormulario() {
            document.getElementById('editar-form').style.display = 'none';
        }
    </script>
</body>
</html>
