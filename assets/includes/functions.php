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
  $perPage = 1;
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
        $iconeDisponivel = "fa-globe";
    }
    
    $item['disponivelPara'] = $sistemaDisponivel;
    $item['iconeDisponivelPara'] = $iconeDisponivel;
    $resultado[] = $item;
    

  }
   
  $totalCourse = count(getCountDowloads());
  $resultado[0][] = ['totalPage' => $totalCourse / $perPage]; 
  $resultado[0][] = ['currentPage' => $page];

  return $resultado;
}



