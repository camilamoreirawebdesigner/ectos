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
    <link href="assets/css/downloads.css" rel="stylesheet">

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
                        <a class="nav-link" href="#">CURSOS</a>
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
        <div class="container mb-5">
            <div class="row mt-5 mb-5">
                <div class="col">
                    <h2 class="fw-500">DOWNLOADS</h2>
                    <hr class="line">
                    <h6 class="fw-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, delectus animi neque illo beatae reprehenderit quasi dignissimos, officia sed totam laboriosam molestias doloribus rerum reiciendis fugiat. Obcaecati debitis fuga ex!</h6>
                </div>
            </div>
            <div class="row justify-content-md-center mb-5 mt-5">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <form action="search.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="arquivo" class="form-control" placeholder="Busque um arquivo..." aria-label="Busque um arquivo..." required>
                            <span id="qtd-reg-filter" style="position: absolute; right: 0; top: 40px;">
                                <?php 
                                    if(count($dowloadsArchives) > 1) {
                                        echo count($dowloadsArchives).' registros';
                                    } else {
                                        echo count($dowloadsArchives).' registro';
                                    }
                                ?>
                            </span>
                            <button type="submit" class="input-group-text button-filter" style="text-decoration: none;" id="btnSearch"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php if (count($dowloadsArchives) > 0) : ?>
                        <?php foreach ($dowloadsArchives as $dowloadArchive) : ?>
                            <div class="arquivo mb-3">
                                <div class="<?= $dowloadArchive['type'] == 'P' ? 'banner-pago' : 'banner-free'; ?>"><?= $dowloadArchive['type'] == 'P' ? 'pago' : 'free'; ?> </div>
                                <h4 class="fw-500 col-8 title"><?= $dowloadArchive['title']; ?></h4>
                                <h6 class="fw-400 col-10 descritpion">
                                    <?= $dowloadArchive['description']; ?>
                                </h6>
                                <div class="row mt-5">
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                        <button type="button" class="btn btn-default <?= $dowloadArchive['type'] == 'P' ? 'btnDetalhePago' : 'btnDetalheFree'; ?>" data-id-curso=<?= $dowloadArchive['id']; ?>>DETALHES</button>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                        <ul>
                                            <li><i class="fas fa-download fa-2x color-three"></i><br><?= $dowloadArchive['type'] == 'P' ? 'Solicitar orçamento' : 'Dowload gratuito'; ?></li>
                                            <li id="liArchive"><?= $dowloadArchive['iconArchive']; ?><br><?= $dowloadArchive['titleArchive']; ?></li>

                                            <li><?= $dowloadArchive['iconeDisponivelPara']; ?><br><?= $dowloadArchive['disponivelPara']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>



                    <div class="course-pagination mb-5">
                        <?php if (count($dowloadsArchives) > 0) : ?>
                            <?php for($q = 0; $q<$dowloadsArchives[0][0]['totalPage']; $q++): ?>
                                <a class="<?= $dowloadsArchives[0][1]['currentPage'] == $q ? 'active' : ''; ?>" href="downloads.php?page=<?=$q?>"> <?= $q+1;?> </a>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>

                    <?php if (count($dowloadsArchives) < 1) : ?>
                        <div class="notFoundArchives">
                            <h1> Registros não encontrados. </h1>
                        </div>
                    <?php endif; ?>


                    <div class="arquivo mb-3" style="display:none;">
                        <div class="banner-pago">pago</div>
                        <h4 class="fw-500 col-8">Planilha de cálculo de salário</h4>
                        <h6 class="fw-400 col-10">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi nulla veritatis, dolore voluptas sed commodi neque nobis natus fugit fugiat? Esse recusandae, cupiditate doloremque non magnam voluptatibus ipsa porro itaque!
                        </h6>
                        <div class="row mt-5">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modal-arquivo-pago">DETALHES</button>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                <ul>
                                    <li><i class="fab fa-wpforms fa-2x color-three"></i><br>Solicitar Orçamento</li>
                                    <li><i class="fas fa-file-excel fa-2x color-three"></i><br>Arquivo.xlsx</li>
                                    <li><i class="fab fa-windows fa-2x color-three"></i><br>Disponível para Windows</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL FREE  -->
        <div class="modal" tabindex="-1" id="modal-arquivo-free">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalhes do arquivo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col">
                                    <h4 class="fw-500 m-title">Planilha de cálculo de salário</h4>
                                    <hr class="line">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <h6 class="fw-400 m-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis saepe, laudantium a soluta nam cum. Dolore at facilis inventore dolorem harum quos non vel, maiores officiis, maxime magnam quod qui?</h6>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                                    <img src="assets/img/arquivo.png" alt="">
                                    <p><em class="m-size">O arquivo contém 10MB.</em></p>
                                </div>
                            </div>

                            <div id="imgs-galeria-free">
                                <div id="dow-galeria" class="row mt-2 modelDow" style="display:none;">
                                    <div class="col">
                                        <img src="assets/img/no-image.jpg" class="img-fluid img-modal" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="assets/img/no-image.jpg" class="img-fluid img-modal" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="assets/img/no-image.jpg" class="img-fluid img-modal" alt="">
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col">
                                    <a type="button" id="btnBaixarFree" class="btn btn-default m-link" target="blank">
                                        <i class="fas fa-download"></i> Baixar agora
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL PAGO -->
        <div class="modal" tabindex="-1" id="modal-arquivo-pago">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalhes do arquivo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col">
                                    <h4 class="fw-500 title-pago">Planilha de cálculo de salário</h4>
                                    <hr class="line">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <h6 class="fw-400 description-pago">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis saepe, laudantium a soluta nam cum. Dolore at facilis inventore dolorem harum quos non vel, maiores officiis, maxime magnam quod qui?</h6>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                                    <img src="assets/img/arquivo.png" alt="">
                                    <p><em class="size-pago">O arquivo contém 10MB.</em></p>
                                </div>
                            </div>

                            <div id="imgs-galeria-pago">
                                <div id="dow-galeria" class="row mt-5 modelDow" style="display:none;">
                                    <div class="col">
                                        <img src="assets/img/no-image.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="assets/img/no-image.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="assets/img/no-image.jpg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <h5 class="fw-500">Preencha suas dados para receber informações de orçamento:</h5>
                                </div>
                            </div>

                            <!-- MENSAGENS DE ALERTA -->
                            <div class="alert alert-success alert-dismissible fade show oculta" role="alert">
                                <strong>Oba!</strong> Recebemos o seu email de solicitação de orçamento, assim que possível retornamos o contato.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <div class="alert alert-danger alert-dismissible fade show oculta" role="alert">
                                <strong>Ops!</strong> Não conseguimos receber o seu email, tente novamente mais tarde.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <form class="mt-3 mb-3" method="POST">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nome" class="form-label">Nome completo <span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="nome" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="whats" class="form-label">WhatsApp <span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="whats" placeholder="(DDD) 0000-0000" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email <span class="required">*</span></label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                <div class="mb-3">
                                                    <label for="qtd" class="form-label">Qtd.</label>
                                                    <input type="text" class="form-control" name="qtd" required>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="button" id="BtnSolicitarOrcamento" class="btn btn-default">
                                        <i class="fas fa-dollar-sign"></i> Solicitar Orçamento
                                    </button>
                                </div>
                            </div>
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

    <!-- Link do Counter Up -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="assets/libraries/counter-up/jquery.counterup.min.js"></script>

    <!-- Link do site -->
    <script src="assets/js/contadores.js"></script>
    <script src="assets/js/botaoTopo.js"></script>
    <script src="assets/js/dowload.js"> </script>



</body>

</html>