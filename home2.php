
<?php
session_start();

// Verifica se o usuário está logado
$is_logged_in = isset($_SESSION['user']);

// Verifica se o usuário é admin
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <script>
        function updateMenu() {
            var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
            var isAdmin = <?php echo json_encode($is_admin); ?>;

            if (isLoggedIn) {
                document.getElementById("loginBtn").style.display = "none";
                document.getElementById("registerBtn").style.display = "none";
                document.getElementById("logoutBtn").style.display = "inline-block";
                if (isAdmin) {
                    document.getElementById("adminBtn").style.display = "inline-block";
                }
            } else {
                document.getElementById("logoutBtn").style.display = "none";
                document.getElementById("adminBtn").style.display = "none";
            }
        }

        window.onload = updateMenu;
    </script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="cadastro.html" id="registerBtn">Cadastro</a></li>
                <li><a href="login.html" id="loginBtn">Login</a></li>
                <li><a href="logout.php" id="logoutBtn" style="display:none;">Logout</a></li>
                <li><a href="controle_acesso.php" id="adminBtn" style="display:none;">Controle de Acesso</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Bem-vindo ao Sistema!</h1>
        <!-- Conteúdo principal da página -->
    </main>
</body>
</html>
