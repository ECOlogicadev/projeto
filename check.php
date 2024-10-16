<?php
function tem_acesso($pagina_id) {
    global $pdo;
    // Verifique se a conexão está estabelecida
    if ($pdo === null) {
        // Estabeleça a conexão
        $pdo = new PDO('mysql:host=localhost;dbname=ecologica', 'usuario', 'senha');
    }

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM acessos WHERE pagina_id = :pagina_id AND user_id = :user_id');
    $stmt->execute([
        'pagina_id' => $pagina_id,
        'user_id' => $_SESSION['user_id']
    ]);

    return $stmt->fetchColumn() > 0;
}
?>
