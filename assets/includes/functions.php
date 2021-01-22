<?php
function getBanners() {
  require 'conection.php';
  $sql = $pdo->query("SELECT * FROM banners ORDER BY ordernacao");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}

function getServices() {

  require 'conection.php';
  $sql = $pdo->query("SELECT * FROM services ORDER BY ordernacao");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}

function getCourses() {

  require 'conection.php';
  $sql = $pdo->query("SELECT * FROM courses ORDER BY ordernacao");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}

function getCountDowloads(){
    
  require 'conection.php';
  $sql = $pdo->query("SELECT * FROM dowloads ORDER BY orderr");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;

}


function getDowloadsArchives($page) {

  require 'conection.php';
  $perPage = 10;
  $sql = $pdo->prepare("SELECT * FROM dowloads ORDER BY orderr LIMIT :page,:perPage");
  $sql->bindValue(":perPage",$perPage,PDO::PARAM_INT);
  $sql->bindValue(":page",$page,PDO::PARAM_INT);
  $sql->execute();
   
  $dowloadsArchives = $sql->fetchAll(PDO::FETCH_ASSOC);
  $resultado = []; 
  
  foreach ($dowloadsArchives as $item) {
      $sistemaDisponivel = '';
      $iconeDisponivel;
      switch ($item['system']) {
      case 'W':
      $sistemaDisponivel = 'Disponivel para windows';
      $iconeDisponivel = 'fa-windows';
      break;
      case 'M':
      $sistemaDisponivel = 'Disponivel para Mac';
      $iconeDisponivel = 'fa-apple';
      break;
      case 'A':
      $sistemaDisponivel = 'Disponivel para Android';
      $iconeDisponivel = 'fa-android';
      break;
      case 'I':
      $sistemaDisponivel = 'Disponivel para Iphone';
      $iconeDisponivel = 'fa-apple';
      break;
      case 'T':
        $sistemaDisponivel = "Todos os sistemas";
        $iconeDisponivel = "fa-globe-americas";
    }
    
    $item['disponivelPara'] = $sistemaDisponivel;
    $item['iconeDisponivelPara'] = $iconeDisponivel;
    $resultado[] = $item;
    

  }
   
  if(count($resultado) > 0){
    
    $totalCourse = count(getCountDowloads());
    $resultado[0][] = ['totalPage' => $totalCourse / $perPage]; 
    $resultado[0][] = ['currentPage' => $page];
  
  } 

  return $resultado;
}


function getCountDowloadsSearch($value){
  
  require 'conection.php';
  $sql = $pdo->prepare("SELECT * FROM dowloads WHERE title LIKE CONCAT('%', :value, '%') ORDER BY orderr");
  $sql->bindValue(":value",$value);
  $sql->execute();
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;


}


function searchArchiveDowload($value,$page){
  require 'conection.php';
  $perPage = 10;
  $dowloadsArchives = [];
  $resultado = [];
  $sql = $pdo->prepare("SELECT * FROM dowloads WHERE title LIKE CONCAT('%', :value, '%') ORDER BY orderr  LIMIT :page,:perPage");
  $sql->bindValue(":page",$page,PDO::PARAM_INT);
  $sql->bindValue(":perPage",$perPage,PDO::PARAM_INT);
  $sql->bindValue(":value",$value);
  $sql->execute();

  $dowloadsArchives = $sql->fetchAll(PDO::FETCH_ASSOC);


  
  foreach ($dowloadsArchives as $item) {
    $sistemaDisponivel = '';
    $iconeDisponivel;
    switch ($item['system']) {
    case 'W':
    $sistemaDisponivel = 'Disponivel para windows';
    $iconeDisponivel = 'fa-windows';
    break;
    case 'M':
    $sistemaDisponivel = 'Disponivel para Mac';
    $iconeDisponivel = 'fa-apple';
    break;
    case 'A':
    $sistemaDisponivel = 'Disponivel para Android';
    $iconeDisponivel = 'fa-android';
    break;
    case 'I':
    $sistemaDisponivel = 'Disponivel para Iphone';
    $iconeDisponivel = 'fa-apple';
    break;
    case 'T':
      $sistemaDisponivel = "Todos os sistemas";
      $iconeDisponivel = "fa-globe-americas";
  }
  
  $item['disponivelPara'] = $sistemaDisponivel;
  $item['iconeDisponivelPara'] = $iconeDisponivel;
  $resultado[] = $item;

} 

if(count($resultado) > 0){
    
  $totalCourse = count(getCountDowloadsSearch($value));
  $resultado[0][] = ['totalPage' => $totalCourse / $perPage]; 
  $resultado[0][] = ['currentPage' => $page];

} 

return $resultado; 


}



