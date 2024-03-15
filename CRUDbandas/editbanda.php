<?php
    require_once  "../init.php";
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $estilo = isset($_POST['estilo']) ? $_POST['estilo'] : null;
    $anoCriacao = isset($_POST['anoCriacao']) ? $_POST['anoCriacao'] : null;
    if(empty($nome) or empty($estilo) or empty($anoCriacao) or empty($id)){
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE Bandas SET nome = :nome, estilo = :estilo, anoCriacao = :anoCriacao WHERE id = :id"; //prepara uma string
    $stmt = $PDO->prepare($sql); //transforma a string em um codigo sql
    $stmt->bindParam(':nome', $nome); //onde tem ':nome' ele substitui pelo valor de $nome, para não ter erro de aspas
    $stmt->bindParam(':estilo', $estilo);
    $stmt->bindParam(':anoCriacao', $anoCriacao);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: ../msgSucesso.html');
    }
    else
    {
        echo "Erro ao alterar!";
        print_r($stmt->errorInfo());
    }
?>