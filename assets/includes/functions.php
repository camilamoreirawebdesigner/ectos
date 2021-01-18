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

function getDowloadsArchives() {

  require 'conection.php';
  $sql = $pdo->query("SELECT * FROM dowloads");
  $dowloadsArchives = $sql->fetchAll(PDO::FETCH_ASSOC);
  $resultado = []; 
  
  foreach ($dowloadsArchives as $item) {
      $sistemaDisponivel = '';
      switch ($item['system']) {
      case 'W':
      $sistemaDisponivel = 'Disponivel para windows';
      break;
      case 'M':
      $sistemaDisponivel = 'Disponivel para Mac';
      break;
      case 'A':
      $sistemaDisponivel = 'Disponivel para Android';
      break;
      case 'I':
      $sistemaDisponivel = 'Disponivel para Iphone';
      break;
      case 'T':
        $sistemaDisponivel = "Todos os sistemas";
    }
    
    $item['disponivelPara'] = $sistemaDisponivel;
    $resultado[] = $item;

  }

  return $resultado;
}
