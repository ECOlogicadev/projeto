<?php
session_start();
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destroi a sessão
header("Location: home.php"); // Redireciona para a página inicial
exit();
?>
