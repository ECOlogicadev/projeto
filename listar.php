<?php
session_start();

// Verifica se o usuário é administrador
if (!isset($_SESSION['fkPerfil']) || $_SESSION['fkPerfil'] != 1) {
    header('Location: acesso_negado.php');
    exit;
}

// Conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecologica', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

// Verifica se a requisição de exclusão foi feita
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta para buscar a imagem
    $stmt = $pdo->prepare("SELECT imagem_principal FROM noticias WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($noticia) {
        // Remove a imagem do diretório
        $imagem = 'uploads/' . $noticia['imagem_principal'];
        if (file_exists($imagem)) {
            unlink($imagem); // Exclui o arquivo
        }

        // Exclui a notícia do banco de dados
        $stmt = $pdo->prepare("DELETE FROM noticias WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redireciona após a exclusão
        header("Location: listar.php");
        exit;
    } else {
        echo 'Notícia não encontrada.';
    }
}

// Busca todas as notícias
$stmt = $pdo->query("SELECT id, titulo, subtitulo, imagem_principal FROM noticias ORDER BY id DESC");
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Notícias</title>
    <link rel="stylesheet" href="paginas.css">
</head>
<body>
    <!-- Cabeçalho -->
    <nav>
        <div class="nav-bar">
            <div class="logo-cabecalho"><a href="index.php"><img src="logos/logo.jpg"></a></div>
            <div class="menu">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="residuos.php">Tipos de Resíduos</a></li>
                    <li><a href="PNRS.php">PNRS</a></li>
                    <li><a href="cooperativas.php">Cooperativas</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                </ul>
            </div>
            <div class="searchBox">
                <form action="consultar.php" method="GET" class="search-field">
                    <input type="text" name="query" placeholder="Buscar" required>
                    <button type="submit"><i class='bx bx-search search'></i></button>
                </form>
            </div>
            <div class="user">
                <div class="user-container">
                    <?php if (isset($_SESSION['nome'])): ?>
                        <span><?php echo " " . $_SESSION['nome']; ?></span>
                        <div class="user-modal">
                            <button class="modal-button" onclick="window.location.href='logout.php'">Logout</button>
                            <?php if ($_SESSION['fkPerfil'] == 1): ?>
                                <button class="modal-button" onclick="window.location.href='postar.php'">Postar</button>
                            <?php endif; ?>
                            <?php if ($_SESSION['fkPerfil'] == 1): ?>
                                <button class="modal-button" onclick="window.location.href='listar.php'">Editar</button>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
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
                        <img src="uploads/<?php echo htmlspecialchars($noticia['imagem_principal']); ?>" alt="Imagem" style="width: 80px; height: auto;">
                    <?php else: ?>
                        <span>Sem imagem</span>
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($noticia['titulo']); ?></td>
                <td><?php echo htmlspecialchars($noticia['subtitulo']); ?></td>
                <td>
                    <!-- Formulário para o botão de edição -->
                    <form method="GET" action="editar.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $noticia['id']; ?>">
                        <button type="submit" class="editar">Editar</button>
                    </form>

                    <!-- Formulário para o botão de exclusão -->
                    <form method="POST" action="listar.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $noticia['id']; ?>">
                        <button type="submit" class="excluir" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
