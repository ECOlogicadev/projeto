<?php
session_start();

// Configuração da conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecologica', 'correto_usuario', 'correta_senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

// Função para verificar o acesso do usuário
if (!function_exists('tem_acesso')) {
    function tem_acesso($pagina_id) {
        global $pdo;

        // Verifique se o usuário está logado
        if (!isset($_SESSION['user_id'])) {
            return false;
        }

        // Preparar e executar a consulta
        $stmt = $pdo->prepare('
            SELECT COUNT(*) 
            FROM perfil_pagina pp
            JOIN usuarios u ON pp.fkPerfil = u.fkPerfil
            WHERE pp.fkPagina = :pagina_id AND u.id = :user_id
        ');

        $stmt->execute([
            'pagina_id' => $pagina_id,
            'user_id' => $_SESSION['user_id']
        ]);

        return $stmt->fetchColumn() > 0;
    }
}

// Defina o ID da página atual
$pagina_id = 6; // Exemplo para a página de controle de acesso

if (!tem_acesso($pagina_id)) {
    // Redireciona o usuário para uma página de erro ou acesso negado
    header('Location: acesso_negado.php');
    exit;
}

// O usuário tem acesso, então o conteúdo da página pode ser exibido
echo "Bem-vindo à página de controle de acesso!";
?>
