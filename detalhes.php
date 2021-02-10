<?php
require 'assets/includes/functions.php';
$page = filter_input(INPUT_GET, 'page');
$value = filter_input(INPUT_GET, 'value');
$categoria = filter_input(INPUT_GET, 'cat');
$courses = [];
if ($value) {
    $courses = searchCourses($value, $page, $categoria);
} else {
    $courses = getCourses($page, $categoria);
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
    <link href="assets/css/detalhes.css" rel="stylesheet">

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

    <div id="detalhes-curso" class="container-fluid mb-5">
        <div id="header-img"></div>
        <div id="name-course"><span>Nome do curso</span></div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">   
                        <i class="fas fa-chalkboard-teacher fa-3x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h5>Professor</h5>
                        <h6 class="fw-300">Camila Moreira</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">   
                        <i class="fas fa-certificate fa-3x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h5>Certificado por</h5>
                        <h6 class="fw-300">Enap</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">
                        <i class="fas fa-clock fa-3x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h5>Carga Horária</h5>
                        <h6 class="fw-300">21 horas</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="item-desc">
                        <h5>Público Alvo</h5>
                        <h6 class="fw-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="item-desc">
                        <h5>Conteúdo Programático</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">   
                        <i class="fas fa-check fa-2x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h6 class="fw-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nulla eligendi aliquid eaque! Eius, laudantium veritatis ratione obcaecati id neque blanditiis explicabo repellendus reprehenderit modi dolorem tenetur enim nisi architecto.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">   
                        <i class="fas fa-check fa-2x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h6 class="fw-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nulla eligendi aliquid eaque! Eius, laudantium veritatis ratione obcaecati id neque blanditiis explicabo repellendus reprehenderit modi dolorem tenetur enim nisi architecto.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">
                        <i class="fas fa-check fa-2x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h6 class="fw-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nulla eligendi aliquid eaque! Eius, laudantium veritatis ratione obcaecati id neque blanditiis explicabo repellendus reprehenderit modi dolorem tenetur enim nisi architecto.</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">   
                        <i class="fas fa-check fa-2x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h6 class="fw-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nulla eligendi aliquid eaque! Eius, laudantium veritatis ratione obcaecati id neque blanditiis explicabo repellendus reprehenderit modi dolorem tenetur enim nisi architecto.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">   
                        <i class="fas fa-check fa-2x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h6 class="fw-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nulla eligendi aliquid eaque! Eius, laudantium veritatis ratione obcaecati id neque blanditiis explicabo repellendus reprehenderit modi dolorem tenetur enim nisi architecto.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">
                        <i class="fas fa-check fa-2x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h6 class="fw-300">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id nulla eligendi aliquid eaque! Eius, laudantium veritatis ratione obcaecati id neque blanditiis explicabo repellendus reprehenderit modi dolorem tenetur enim nisi architecto.</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="item-desc">
                        <h5>Módulos</h5>
                    </div>
                </div>
            </div>
            <div id="tbl-mod" class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>01.</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td class="text-center" style="width: 100px;">2 h</td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>02.</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td class="text-center" style="width: 100px;">3 h</td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>03.</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td class="text-center" style="width: 100px;">10 h</td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>04.</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td class="text-center" style="width: 100px;">1 h</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row" style="display: none;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="item-desc">
                        <h5 class="fw-700">Preencha seus dados para receber informações de orçamento:</h5>
                    </div>
                </div>
            </div>
            <div id="form-orcamento" style="display: none;">
                    <form action="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <label for="" class="form-label">Nome completo:</label>
                            <input type="text" class="form-control" id="nome">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <label for="" class="form-label">Whatsapp:</label>
                            <input type="text" class="form-control" id="whatsapp" placeholder="(DDD) 0000-0000">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <label for="" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <label for="" class="form-label">Qtd.:</label>
                            <input type="text" class="form-control" id="qtd">
                        </div>
                    </div>
                </form>
            </div>
            <div id="box-comprar" class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 d-grid">
                    <button type="button" id="btnComprar" class="btn btn-default">
                        <i class="fas fa-cart-plus"></i> COMPRAR
                    </button>
                    <button type="button" id="btnSolicitar" class="btn btn-default" style="display: none;">
                        <i class="fas fa-dollar-sign"></i> SOLICITAR
                    </button>
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

    <!-- Link do site -->
    <script src="assets/js/botaoTopo.js"></script>

</body>

</html>