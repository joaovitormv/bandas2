<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome, estilo, anoCriacao FROM Bandas ORDER BY id ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandas</title>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
</head>
<body>
    <div class="container">
            <div class="jumbotron">
                <p class="h3 text-center">Bandas Cadastradas</p>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estilo Musical</th>
                        <th scope="col">Ano de Criação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($banda = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <th scope="row"><?php echo $banda['id'] ?></th>
                            <td><?php echo $banda['nome'] ?></td>
                            <td><?php echo $banda['estilo'] ?></td>
                            <td><?php echo $banda['anoCriacao'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="../formulários/formeditbanda.php?id=<?php echo $banda['id'] ?>">Editar</a> 
                                <a class="btn btn-danger" href="./removebanda.php?id=<?php echo $banda['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
</body>
</html>