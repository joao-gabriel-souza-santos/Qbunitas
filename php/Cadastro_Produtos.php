<?php
    require_once 'Conexao.php';
    try{
        $conexao = conectarBanco();
        $nome = filter_input(INPUT_POST, 'nome-do-produto', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao-do-produto', FILTER_SANITIZE_STRING);
        $tamanho = filter_input(INPUT_POST, 'tamanho-do-produto', FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, 'preco-do-produto', FILTER_SANITIZE_STRING);
        $imagemTmp = $_FILES['imagem-do-produto']['tmp_name'];
        $imagemConteudo = file_get_contents($imagemTmp);
        $sql = "INSERT INTO produtos (nome, descricao, tamanho, preco, imagem) VALUES (:nome, :descricao, :tamanho, :preco, :imagem);";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindValue(':tamanho', $tamanho, PDO::PARAM_STR);
        $stmt->bindValue(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindValue(':imagem', $imagemConteudo, PDO::PARAM_LOB);
        $stmt->execute();
        echo "Cadastro no banco de dados efetuado com sucesso";
        header ('Location: /projetoweb/html/index.php');
        exit();

    } catch(PDOException $e){
        echo "Erro ao cadastrar no banco de dados".$e->getMessage();
    }
?>