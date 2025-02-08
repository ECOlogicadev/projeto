<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <!-- CSS -->
   <link rel="stylesheet" href="style_php.css">

<!-- Ícones -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        // Redireciona para a home após 3 segundos
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 3000);
    </script>
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
    </nav><?php 
session_start();

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica";

// Criar conexão
$conectar = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conectar->connect_error) {
    die("Conexão falhou: " . $conectar->connect_error);
}

// Verificar se os dados foram enviados pelo método POST 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $created = date('Y-m-d H:i:s');

    // Validação básica
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido.";
        exit;   
    }
    
    // Aplicar hash à senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Prepara e executa a inserção, definindo fkPerfil como 2 (convidado)
    $stmt = $conectar->prepare("INSERT INTO usuarios (nome, email, senha, created, fkPerfil) VALUES (?, ?, ?, ?, 2)");
    
    if ($stmt === false) {
        echo "Erro na preparação da consulta.";
        exit;
    }

    $stmt->bind_param("ssss", $nome, $email, $senha_hash, $created);

    if ($stmt->execute()) {
        // Mensagem de sucesso e botão de retorno
        echo "<h1>Usuário registrado com sucesso. </h1>";
        echo "<p>Retornando em 3 segundos.</p>";
       
    } else {
        echo "Erro ao registrar usuário.";
    }

    // Fechar declaração e conexão
    $stmt->close();
}

$conectar->close();
?>
