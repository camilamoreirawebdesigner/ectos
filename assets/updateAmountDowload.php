<?php 
require './includes/conection.php';
$idCurso = filter_input(INPUT_POST,'id');

//ATUALIZANDO QUANTIDADE DE DOWLOADS
$sql = $pdo->prepare("UPDATE dowloads SET used = used + 1 WHERE id = :id");
$sql->bindValue(":id",$idCurso);
$sql->execute();

