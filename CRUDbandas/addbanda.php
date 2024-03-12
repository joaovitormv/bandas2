<?php
require_once '../init.php';
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$estilo = isset($_POST['estilo']) ? $_POST['estilo'] : null;
$anoCriacao = isset($_POST['anoCriacao']) ? $_POST['anoCriacao'] : null;


if(empty($nome) or empty($estilo) or empty($anoCriacao)){
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO Bandas(nome, estilo, anoCriacao) VALUES(:nome, :estilo, :anoCriacao)"; //prepara uma string
$stmt = $PDO->prepare($sql); //transforma a string em um codigo sql
$stmt->bindParam(':nome', $nome); //onde tem ':nome' ele substitui pelo valor de $nome, para não ter erro de aspas
$stmt->bindParam(':estilo', $estilo);
$stmt->bindParam(':anoCriacao', $anoCriacao);

if ($stmt->execute())
{
    header('Location: ../msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>