<?php
require 'assets/includes/functions.php';
$page = filter_input(INPUT_GET, 'page');
if ($page) {
    $dowloadsArchives = getDowloadsArchives($page);
} else {
    $dowloadsArchives = getDowloadsArchives(0);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Ectos - Educação Executiva</title>

    <!-- Links do site -->
    <link href="assets/css/cursos.css" rel="stylesheet">

    <!-- Links do Bootstrap 5 -->
    <link href="assets/libraries/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/libraries/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Links do Fontswesome 5.15.1 -->
    <link href="assets/libraries/fontawesome/css/all.css" rel="stylesheet">

    <!-- Link do Google Fonts - Rubik Light 300, Regular 400, Medium 500 e Bold 700 -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Link do Jquery 1.10.2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <style>
        .navbar-default {
            position: inherit !important;
        }
    </style>
</head>

<body>
    <!-- TOP MENU -->
    <div id="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <span>
                        <a href="mailto:contato@ectos.com.br">
                            <i class="far fa-envelope"></i> contato@ectos.com.br
                        </a>
                    </span>
                    <span>
                        <a href="https://www.instagram.com/ectosoficial/" target="blank">
                            <i class="fab fa-instagram"></i> ectosoficial
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- MENU -->
    <nav id="nabvar-default" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logomarca.png" alt="Ectos" height="30px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quem-somos">QUEM SOMOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">SERVIÇOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cursos.php">CURSOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="downloads.php">DOWNLOADS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">CONTATO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- DOWNLOADS -->
    <div id="downloads">
        <div class="container" style="margin-bottom: 150px;">
            <div class="row mt-5 mb-5">
                <div class="col">
                    <h2 class="fw-500">CURSOS</h2>
                    <hr class="line">
                    <h6 class="fw-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, delectus animi neque illo beatae reprehenderit quasi dignissimos, officia sed totam laboriosam molestias doloribus rerum reiciendis fugiat. Obcaecati debitis fuga ex!</h6>
                </div>
            </div>
            <div class="row justify-content-md-center mb-5 mt-5">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <form action="search.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="arquivo" class="form-control" placeholder="Busque um arquivo..." aria-label="Busque um arquivo..." required>
                            <span id="qtd-reg-filter" style="position: absolute; right: 0; top: 40px;">7 registros encontrados</span>
                            <button type="submit" class="input-group-text button-filter" style="text-decoration: none;" id="btnSearch"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#" class="cat-presencial"><span><i class="fas fa-user"></i></span> PRESENCIAL</a>
                    <a href="#" class="cat-online"><span><i class="fas fa-desktop"></i></span> ONLINE</a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="course-item text-center">
                        <div class="course-img">
                            <img src="assets/img/img-01.jpg" class="img-fluid">
                            <a href="#" class="cat-presencial"><span><i class="fas fa-user"></i></span></a>
                        </div>
                        <div class="course-dsc mt-2">
                            <h5>Capacitação Executiva</h5>
                            <h6 class="fw-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit adipisci possimus modi quo, animi et cupiditate obcaecati sunt doloribus illo quaerat tempore, nobis atque hic? Molestiae rerum voluptatum delectus rem.</h6>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-default btn-block" style="border-radius: 0 !important;">SOLICITAR ORÇAMENTO</button>
                        </div>  
                    </div>                                     
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="course-item text-center">
                        <div class="course-img">
                            <img src="assets/img/img-01.jpg" class="img-fluid">
                            <a href="#" class="cat-online"><span><i class="fas fa-desktop"></i></span></a>
                        </div>
                        <div class="course-dsc mt-2">
                            <h5>Capacitação Executiva</h5>
                            <h6 class="fw-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit adipisci possimus modi quo, animi et cupiditate obcaecati sunt doloribus illo quaerat tempore, nobis atque hic? Molestiae rerum voluptatum delectus rem.</h6>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-default btn-block" style="border-radius: 0 !important;">SABER MAIS</button>
                        </div> 
                    </div>          
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="course-item text-center">
                        <div class="course-img">
                            <img src="assets/img/img-01.jpg" class="img-fluid">
                            <a href="#" class="cat-online"><span><i class="fas fa-desktop"></i></span></a>
                        </div>
                        <div class="course-dsc mt-2">
                            <h5>Capacitação Executiva</h5>
                            <h6 class="fw-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit adipisci possimus modi quo, animi et cupiditate obcaecati sunt doloribus illo quaerat tempore, nobis atque hic? Molestiae rerum voluptatum delectus rem.</h6>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-default btn-block" style="border-radius: 0 !important;">SABER MAIS</button>
                        </div>
                    </div>       
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="course-item text-center">
                        <div class="course-img">
                            <img src="assets/img/img-01.jpg" class="img-fluid">
                            <a href="#" class="cat-presencial"><span><i class="fas fa-user"></i></span></a>
                        </div>
                        <div class="course-dsc mt-2">
                            <h5>Capacitação Executiva</h5>
                            <h6 class="fw-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit adipisci possimus modi quo, animi et cupiditate obcaecati sunt doloribus illo quaerat tempore, nobis atque hic? Molestiae rerum voluptatum delectus rem.</h6>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-default btn-block" style="border-radius: 0 !important;">SOLICITAR ORÇAMENTO</button>
                        </div>  
                    </div>                                     
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="course-item text-center">
                        <div class="course-img">
                            <img src="assets/img/img-01.jpg" class="img-fluid">
                            <a href="#" class="cat-online"><span><i class="fas fa-desktop"></i></span></a>
                        </div>
                        <div class="course-dsc mt-2">
                            <h5>Capacitação Executiva</h5>
                            <h6 class="fw-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit adipisci possimus modi quo, animi et cupiditate obcaecati sunt doloribus illo quaerat tempore, nobis atque hic? Molestiae rerum voluptatum delectus rem.</h6>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-default btn-block" style="border-radius: 0 !important;">SABER MAIS</button>
                        </div> 
                    </div>          
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="course-item text-center">
                        <div class="course-img">
                            <img src="assets/img/img-01.jpg" class="img-fluid">
                            <a href="#" class="cat-online"><span><i class="fas fa-desktop"></i></span></a>
                        </div>
                        <div class="course-dsc mt-2">
                            <h5>Capacitação Executiva</h5>
                            <h6 class="fw-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit adipisci possimus modi quo, animi et cupiditate obcaecati sunt doloribus illo quaerat tempore, nobis atque hic? Molestiae rerum voluptatum delectus rem.</h6>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-default btn-block" style="border-radius: 0 !important;">SABER MAIS</button>
                        </div>
                    </div>       
                </div>
            </div>
           
        </div>

       
    </div>

    <div class="container-fluid">
        <div id="rodape" class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 text-start">
                &copy; Ectos, 2020. Todos os direitos reservados.
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 text-end">
                <span><a href="http://squadweb.com.br/" target="blank">Desenvolvido por Squad Web</a>.</span>
            </div>
        </div>
    </div>

    <div id="goTop" class="back-to-top">
        <a href="#"><i class="fas fa-arrow-circle-up fa-3x"></i></a>
    </div>

    <div class="loading-modal text-light" tabindex="-1" style="display:none;">
        <div class="spinner-border" role="status" style="position:relative; top:50%;">
            <span class="sr-only">Carregando...</span>
        </div>
    </div>

    <!-- Link do site -->
    <script src="assets/js/botaoTopo.js"></script>

</body>

</html>