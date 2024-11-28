<?php
// Incluir o arquivo que contém a função de recuperação dos produtos
require_once '../php/Listar_produtos.php';

// Recuperar a lista de produtos
$produtos = getProdutos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="/projetoweb/css/style.css">
</head>

<body>
    <header class="header">
        <nav class="navbar"> 
            <a href="index.html"><img src="/projetoweb/imagens/LOGO (1).png" alt="" width="140" height="100"></a>
            <li> <a href="/projetoweb/html/index.php">Home</a>
            <li> <a href="/projetoweb/html/login.html">Entrar</a>
            <li><a href="/projetoweb/html/carrinho.html"><img src="/projetoweb/imagens/shopping-bag.png" width="30" height="30"> </a>
        </nav>
    </header>

    <section id="produto1" class="section-p1">
        <div class="pro-container">
            <?php
                // Verificar se há produtos para exibir
                if (count($produtos) > 0) {
                    foreach ($produtos as $produto) {
                        echo '<div class="pro">';
                        echo '<a href="/projetoweb/html/uniproduto.html?id=' . $produto['id'] . '">';

                        // Converter a imagem para base64 e exibi-la
                        $imagemBase64 = base64_encode($produto['imagem']);
                        echo '<img src="data:image/png;base64,' . $imagemBase64 . '" alt="Produto">';

                        echo '</a>';
                        echo '<div class="desc">';
                        echo '<span>' . htmlspecialchars($produto['nome']) . '</span>';
                        echo '<h5>' . htmlspecialchars($produto['descricao']) . '</h5>';
                        echo '<h4>R$' . htmlspecialchars($produto['preco']) . '</h4>';
                        echo '</div>';
                        echo '<a href="uniproduto.php?id=' . $produto['id'] . '"><img src="/projetoweb/imagens/shopping-cart (4).png" class="carrinho-produto"></a>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Não há produtos cadastrados.</p>";
                }
            ?>
        </div>
    </section>
</body>

</html>