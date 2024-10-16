<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecologica"; // Substitua pelo nome correto do banco

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Capturando os dados do formulário
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$usuario_id = 1; // Exemplo de ID de usuário (você pode pegar o ID do usuário logado)

// Verificando se há uma imagem e salvando o arquivo
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    // Gerando um nome único para a imagem
    $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    $nomeArquivo = uniqid() . '.' . $extensao;
    $caminho = 'uploads/' . $nomeArquivo;

    // Movendo o arquivo para a pasta de uploads
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true); // Cria a pasta se ela não existir
    }
    move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho);
} else {
    $caminho = null; // Se não houver imagem
}

// Inserindo a postagem no banco de dados
$query = "INSERT INTO postagens (titulo, conteudo, imagem, created, usuario_id) 
          VALUES (?, ?, ?, NOW(), ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("sssi", $titulo, $conteudo, $caminho, $usuario_id);
$stmt->execute();

// Verificando se a postagem foi inserida com sucesso
if ($stmt->affected_rows > 0) {
    echo "Postagem inserida com sucesso!";
} else {
    echo "Erro ao inserir postagem.";
}

// Fechando a conexão
$stmt->close();
$conn->close();
?>
