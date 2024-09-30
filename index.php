<?php
include 'conexao.php';

$sql = "SELECT * FROM livros";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Biblioteca</h1>

        <h2>Adicionar Novo Livro</h2>
        <form action="adicionar.php" method="post">
            <label for="nome" class="label">Nome:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>
            
            <label for="autor" class="label">Autor:</label><br>
            <input type="text" id="autor" name="autor" required><br><br>
            
            <label for="editora" class="label">Editora:</label><br>
            <input type="text" id="editora" name="editora" required><br><br>
            
            <label for="ano" class="label">Ano:</label><br>
            <input type="number" id="ano" name="ano" required><br><br>
            
            <input type="submit" value="Adicionar Livro">
        </form>

        <h2>Livros Cadastrados</h2>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Ano</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["codigo"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["autor"] . "</td>";
                    echo "<td>" . $row["editora"] . "</td>";
                    echo "<td>" . $row["ano"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum livro cadastrado.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>

<?php
$conn->close();
?>