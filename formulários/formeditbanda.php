<?php
    require '../init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (empty($id))
    {
        echo "ID para alteração não definido";
        exit;
    }
    $PDO = db_connect();
    $sql = "SELECT id, nome, estilo, anoCriacao FROM Bandas WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $banda = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!is_array($banda))
    {
        echo "Nenhum cadastro encontrado";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Banda</title>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Editar bandas</p>
        </div>
        <form action="../CRUDbandas/editbanda.php" method="post">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $banda['nome'] ?>">
            </div>
            <div class="form-group">
                <label for="estilo">Estilo musical: </label>
                <input type="text" class="form-control" name="estilo" id="estilo" value="<?php echo $banda['estilo'] ?>">
            </div>
            <div class="form-group">
                <label for="anoCriacao">Ano de criação: </label>
                <input type="number" class="form-control" name="anoCriacao" id="anoCriacao" value="<?php echo $banda['anoCriacao'] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-danger" href="../index.html">Cancelar</a>
          </form>
    </div>
</body>
</html>