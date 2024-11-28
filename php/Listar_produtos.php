<?php
require_once 'Conexao.php'; // Inclua o arquivo de conexão

function getProdutos() {
    try {
        // Conectar ao banco de dados
        $conexao = conectarBanco();

        // Consulta SQL para recuperar os produtos
        $sql = "SELECT id, nome, descricao, preco, imagem FROM produtos";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        // Recuperar todos os produtos
        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verificar se a imagem é um recurso e convertê-la para binário
            if (is_resource($row['imagem'])) {
                $row['imagem'] = stream_get_contents($row['imagem']);
            }
            $produtos[] = $row;
        }

        return $produtos;
    } catch (PDOException $e) {
        echo "Erro ao recuperar os produtos: " . $e->getMessage();
        return [];
    }
}
?>