<?php
   function getBanners() {
        require 'conection.php';
        $sql = $pdo->query("SELECT * FROM banners ORDER BY ordernacao");
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
        
    }

   function getServices(){
       
        require 'conection.php';
        $sql = $pdo->query("SELECT * FROM services ORDER BY ordernacao");
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
        
   }

   function getCourses(){
       
     require 'conection.php';
     $sql = $pdo->query("SELECT * FROM courses ORDER BY ordernacao");
     $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
     return $lista;

   }

   function getArchives(){
      
     require 'conection.php';
     $sql = $pdo->query("SELECT * FROM archives_dowloads");
     $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
     return $lista;

   }

