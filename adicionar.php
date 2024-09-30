<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $ano = $_POST['ano'];

    $sql = "INSERT INTO livros (nome, autor, editora, ano) VALUES ('$nome', '$autor', '$editora', '$ano')";

    if ($conn->query($sql) === TRUE) {
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o livro: " . $conn->error;
    }

    header("Location: index.php");
    exit();
}

$conn->close();
?>