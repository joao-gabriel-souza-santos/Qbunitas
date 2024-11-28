<?php
require_once 'Conexao.php'; // Arquivo de conexão com o banco de dados

if (isset($_GET['id'])) {
    try {
        // Conectar ao banco de dados
        $conexao = conectarBanco();

        // Obter o ID da imagem
        $id = intval($_GET['id']);

        // Consultar a imagem no banco de dados
        $sql = "SELECT imagem FROM produtos WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            // Definir o tipo de conteúdo como imagem
            header("Content-Type: image/jpeg");
            echo $produto['imagem'];
        } else {
            echo "Imagem não encontrada.";
        }
    } catch (PDOException $e) {
        echo "Erro ao exibir a imagem: " . $e->getMessage();
    }
} else {
    echo "ID da imagem não fornecido.";
}