<?php
//PUXANDO CONEXÃO COM O BANCO 
require 'conection.php';

function getBanners() {
  global $pdo;
  $sql = $pdo->query("SELECT * FROM banners ORDER BY ordernacao");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}

function getServices() {
  global $pdo;
  $sql = $pdo->query("SELECT * FROM services ORDER BY ordernacao");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}


function getCountCourses($cat = 0){
  global $pdo;
  
  $sql = "";
  $lista = [];
  if($cat != 0){
    $sql = $pdo->prepare("SELECT * FROM courses WHERE courses_categories_id = :categoria ORDER BY orderr");
    $sql->bindValue(":categoria",$cat,PDO::PARAM_INT);
    $sql->execute();
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  } else {
    $sql = $pdo->query("SELECT * FROM courses  ORDER BY orderr");
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  }
  
 
  return count($lista);
}

function getCourses($page = 0,$cat = 0) {
  require 'vendor/autoload.php';
  global $pdo;
  $perPage = 6;

   // usando query builder
   $h = new \ClanCats\Hydrahon\Builder('mysql', function ($query, $queryString, $queryParameters) use ($pdo) {
    $statement = $pdo->prepare($queryString);
    $statement->execute($queryParameters);
    if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  });
   
  $courseTable = $h->table('courses'); 
  $courses = [];

  if($cat == 0){
    $courses = $courseTable->select()->orderBy('orderr','desc')->page($page,$perPage)->get();
  } else {
    $courses = $courseTable->select()->where('courses_categories_id',$cat)->orderBy('orderr','desc')->page($page,$perPage)->get();
  }

  $coursesTot = [];
  foreach($courses as $course){
     $course['image'] = 'data:image/jpg;base64,'.base64_encode($course['image']);
     $coursesTot[] = $course;
  }
  
  if (count($coursesTot) > 0) {
    $totalCourse = getCountCourses($cat);
    $totalPaginas = ceil($totalCourse / $perPage);
    $coursesTot[0][] = ['totalPage' => $totalPaginas];
    $coursesTot[0][] = ['currentPage' => $page];
  }
  return $coursesTot;
} 


function getCountDowloads() {

  global $pdo;
 

  $sql = $pdo->query("SELECT * FROM dowloads ORDER BY orderr");
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}


function getDowloadsArchives($page) {
  
  global $pdo;
  require 'vendor/autoload.php';

  // usando query builder
  $h = new \ClanCats\Hydrahon\Builder('mysql', function ($query, $queryString, $queryParameters) use ($pdo) {
    $statement = $pdo->prepare($queryString);
    $statement->execute($queryParameters);
    if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  });
   
  $perPage = 5;
  $dowloads = $h->table('dowloads');
  $dowloadsArchives = $dowloads->select()->orderBy('orderr','desc')->page($page,$perPage)->get();
  $resultado = [];

  foreach ($dowloadsArchives as $item) {
    $sistemaDisponivel = '';
    $iconeDisponivel;
    switch ($item['system']) {
      case 'W':
        $sistemaDisponivel = 'Disponivel para windows';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-windows"></i>';
        break;
      case 'M':
        $sistemaDisponivel = 'Disponivel para Mac';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-apple"></i>';
        break;
      case 'A':
        $sistemaDisponivel = 'Disponivel para Android';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-android"></i>';
        break;
      case 'I':
        $sistemaDisponivel = 'Disponivel para Iphone';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-apple"></i>';
        break;
      case 'T':
        $sistemaDisponivel = "Todos os sistemas";
        $iconeDisponivel = "fa-2x color-three fa-globe-americas";
    }

    $item['disponivelPara'] = $sistemaDisponivel;
    $item['iconeDisponivelPara'] = $iconeDisponivel;
    $resultado[] = $item;
  }

  if (count($resultado) > 0) {

    $totalCourse = count(getCountDowloads());
    $totalPaginas = ceil($totalCourse / $perPage);
    $resultado[0][] = ['totalPage' => $totalPaginas];
    $resultado[0][] = ['currentPage' => $page];
  }

  return $resultado;
}


function getCountDowloadsSearch($value) {

  global $pdo;
  $sql = $pdo->prepare("SELECT * FROM dowloads WHERE title LIKE CONCAT('%', :value, '%') ORDER BY orderr");
  $sql->bindValue(":value", $value);
  $sql->execute();
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $lista;
}

function searchCourses($value,$page = 0,$cat = 0){
  require 'vendor/autoload.php';
  global $pdo;
  
   $perPage = 6;
   // usando query builder
   $h = new \ClanCats\Hydrahon\Builder('mysql', function ($query, $queryString, $queryParameters) use ($pdo) {
    $statement = $pdo->prepare($queryString);
    $statement->execute($queryParameters);
    if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  });

  $courseTable = $h->table('courses'); 
  $courses = [];

  $coursesCount = 0;

  if($cat == 0){
    $courses = $courseTable->select()->where('title','like',"%$value%")->orderBy('orderr','desc')->page($page,$perPage)->get();
    $coursesCount =  $courseTable->select()->where('title','like',"%$value%")->orderBy('orderr','desc')->get();
  } else {
    $courses = $courseTable->select()->where('courses_categories_id',$cat)->where('title','like',"%$value%")->orderBy('orderr','desc')->page($page,$perPage)->get();
    $coursesCount = $courseTable->select()->where('courses_categories_id',$cat)->where('title','like',"%$value%")->orderBy('orderr','desc')->get();
  }

  $coursesTot = [];
  foreach($courses as $course){
     $course['image'] = 'data:image/jpg;base64,'.base64_encode($course['image']);
     $coursesTot[] = $course;
  }
  
  if (count($coursesTot) > 0) {
    $totalCourse = count($coursesCount);
    $totalPaginas = ceil($totalCourse / $perPage);
    $coursesTot[0][] = ['totalPage' => $totalPaginas];
    $coursesTot[0][] = ['currentPage' => $page];
  }
  
   
  return $coursesTot;
}


function searchArchiveDowload($value, $page) {
  require 'vendor/autoload.php';
   global $pdo;
   // usando query builder
   $h = new \ClanCats\Hydrahon\Builder('mysql', function ($query, $queryString, $queryParameters) use ($pdo) {
    $statement = $pdo->prepare($queryString);
    $statement->execute($queryParameters);
    if ($query instanceof \ClanCats\Hydrahon\Query\Sql\FetchableInterface) {
      return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  });
  
  $perPage = 5;
  $resultado = [];
  $dowloads = $h->table('dowloads');
  $dowloadsArchives = $dowloads->select()->where('title', 'like',"%$value%")->orderBy('orderr','desc')->page($page,$perPage)->get();
 
  foreach ($dowloadsArchives as $item) {
    $sistemaDisponivel = '';
    $iconeDisponivel;
    switch ($item['system']) {
      case 'W':
        $sistemaDisponivel = 'Disponivel para windows';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-windows"></i>';
        break;
      case 'M':
        $sistemaDisponivel = 'Disponivel para Mac';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-apple"></i>';
        break;
      case 'A':
        $sistemaDisponivel = 'Disponivel para Android';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-android"></i>';
        break;
      case 'I':
        $sistemaDisponivel = 'Disponivel para Iphone';
        $iconeDisponivel = '<i class="fa-2x color-three fab fa-apple"></i>';
        break;
      case 'T':
        $sistemaDisponivel = "Todos os sistemas";
        $iconeDisponivel = "fa-2x color-three fa-globe-americas";
    }

    $item['disponivelPara'] = $sistemaDisponivel;
    $item['iconeDisponivelPara'] = $iconeDisponivel;
    $resultado[] = $item;
  }

  if (count($resultado) > 0) {

    $totalCourse = count(getCountDowloadsSearch($value));
    $resultado[0][] = ['totalPage' => ceil($totalCourse / $perPage)];
    $resultado[0][] = ['currentPage' => $page];
  }

  return $resultado;
}
