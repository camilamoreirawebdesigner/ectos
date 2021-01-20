<?php 
require './includes/conection.php';

$id = filter_input(INPUT_POST,'idCurso');
$sql = $pdo->prepare("SELECT title,description,link,size FROM dowloads WHERE id = :id");
$sql->bindValue(":id",$id);
$sql->execute();

$dados = $sql->fetch(PDO::FETCH_ASSOC);

$sql = $pdo->prepare("SELECT archive FROM dowloads_images WHERE dowloads_id = :id");
$sql->bindValue(":id",$id);
$sql->execute();


$imagens = $sql->fetchAll(PDO::FETCH_ASSOC);
$imagensTot = [];
if($sql->rowCount() > 0){
    foreach($imagens as $img) {
        $img = base64_encode($img['archive']);
        array_push($imagensTot,$img);
    }
}



$array = array(
    "nome" => $dados["title"],
    "link" => $dados["link"],
    "descricao" => $dados["description"],
    "tamanho" => $dados["size"],
    "imagens" => $imagensTot
);

echo json_encode($array);