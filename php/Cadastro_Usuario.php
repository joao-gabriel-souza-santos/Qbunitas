<?php
    require_once 'Conexao.php';
    try{
        $conexao = conectarBanco();
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, cpf, email, data_nasc, senha) VALUES (:nome, :cpf, :email, :data_nasc, :senha);";

        $stmt = $conexao->prepare($sql);
        $stmt -> execute([
            ':nome'=> $nome,
            ':cpf' => $cpf,
            ':email' => $email,
            ':data_nasc' => $data_nasc,
            ':senha' => $senha
        ]);

        echo "Cadastro no banco de dados efetuado com sucesso";
        header ('Location: /projetoweb/html/cadastro.html');
        exit();

    } catch(PDOException $e){
        echo "Erro ao cadastrar no banco de dados".$e->getMessage();
    }
?>