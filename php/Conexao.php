<?php

function conectarBanco(){
    

    try{
        $endereco = 'localhost';
        $banco = 'postgres';
        $usuario = 'postgres';
        $senha = 'root';
        $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $pdo->exec("SET search_path TO qbunitas");
        echo "Conectado ao banco de dados";
        return $pdo;
    }catch(PDOException $e){
    echo "Falha ao conectar ao banco de dados <br/>";
    die($e-> getMessage());
    }
}

?>