<?php
require 'assets/includes/functions.php';
$listaBanners = getBanners();
$listaServices = getServices();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Ectos - Educação Executiva</title>

    <!-- Links do site -->
    <link href="assets/css/style.css" rel="stylesheet">

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
</head>

<body>
    <!-- TOP MENU -->
    <!--<div id="top-menu">
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
    </div>-->

    <!-- CAROUSEL -->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($listaBanners as $banner) : ?>
                <li data-bs-target="#carousel" data-bs-slide-to="<?= ($banner['id'] - 1); ?>" class="<?= $banner['id'] == 1 ? 'active' : ''; ?>"></li>
            <?php endforeach; ?>
        </ol>

        <div class="carousel-inner">
            <?php foreach ($listaBanners as $banner) : ?>
                <div class="carousel-item <?= $banner['id'] == 1 ? 'active' : ''; ?>">
                    <img src="<?= 'data:image/jpg;base64,' . base64_encode($banner['image']); ?>" class="d-block w-100 img-fluid " alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3><?= $banner['title']; ?></h3>
                        <p><?= $banner['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
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
                    <li class="nav-item">
                    <a  href="https://www.instagram.com/ectosoficial/" class="nav-link">
                        <i class="fab fa-instagram"></i>
                    </a>  
                    </li>
                    <li class="nav-item">
                    <span>
                        <a href="mailto:contato@ectos.com.br" class="nav-link">
                            <i class="far fa-envelope"></i> 
                        </a>
                    </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div data-bs-spy="scroll" data-bs-target="#nabvar-default" data-bs-offset="0" tabindex="0" style="outline: none;">

        <!-- QUEM SOMOS -->
        <div id="quem-somos">
            <div class="container">
                <div class="row mt-5 mb-5">
                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 order-sm-2 order-md-1">
                        <h2 class="fw-500">A EMPRESA</h2>
                        <hr class="line">
                        <h6 class="fw-400">A ectos é uma empresa de educação executiva focada no desenvolvimento de micro e pequenas empresas. Elaboramos treinamentos específicos, acessíveis e com temas relevantes para o seu negócio, que irão tornar sua gestão mais assertiva e transformar os resultados de sua empresa..</h6>
                    </div>
                    <div class="d-none d-sm-block col-sm-6 col-md-4 col-lg-4 order-sm-1 order-md-2">
                        <a href="https://www.youtube.com/channel/UCdgFgifcu-9LL5nt4A_cVCA" target="blank">
                            <img id="quem-somos-img" src="assets/img/quem-somos-video.jpg" class="img-fluid" alt="Ectos - Educação Executiva">
                        </a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col bg-one p-5 text-white">
                        <h1 class="fw-700">01.</h1>
                        <h4 class="fw-500">CONCEITO</h4>
                        <h6 class="fw-400">Integridade, compromisso, respeito e honestidades são os princípios que regem as ações e comportamentos de todos os indivíduos que fazem parte de nossa equipe.</h6>
                    </div>
                    <div class="col bg-two p-5 text-white">
                        <h1 class="fw-700">02.</h1>
                        <h4 class="fw-500">DESENVOLVIMENTO</h4>
                        <h6 class="fw-400">Buscamos dia a dia ser reconhecidos como a melhor empresa de treinamento executivo para micro e pequenas empresas no Brasil.</h6>
                    </div>
                    <div class="col bg-three p-5 text-white">
                        <h1 class="fw-700">03.</h1>
                        <h4 class="fw-500">TESTES</h4>
                        <h6 class="fw-400">Fornecemos soluções que ajudam você a extrair o resultado máximo de seu negócio.</h6>
                    </div>
                </div>
            </div>

            <div id="quem-somos-pilares" class="container">
                <div class="row mt-5 mb-5">
                    <div id="box-pilares" class="col-xs-12 col-sm-12 col-md-6">
                        <img src="assets/img/quem-somos-pilares.jpg" class="img-fluid" alt="Ectos - Nossos principais pilares.">
                        <span>
                            <h1>Nossos principais pilares</h1>
                            <h4>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </h4>
                        </span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div id="quem-somos-pilares-content" class="mt-4">
                            <div id="quem-somos-pilares-box1" class="row">
                                <div class="col ">
                                    <span class="quem-somos-pilares-number">01</span>
                                    <span class="quem-somos-pilares-text">
                                        <h5>Excelência Operacional</h5>
                                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quaerat dicta asperiores, ipsa earum accusantium sapiente!</h6>
                                    </span>
                                </div>
                                <div class="col">
                                    <span class="quem-somos-pilares-number">02</span>
                                    <span class="quem-somos-pilares-text">
                                        <h5>Excelência Operacional</h5>
                                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quaerat dicta asperiores, ipsa earum accusantium sapiente!</h6>
                                    </span>
                                </div>
                            </div>
                            <div class="row" id="quem-somos-pilares-box2">
                                <div class="col">
                                    <span class="quem-somos-pilares-number">03</span>
                                    <span class="quem-somos-pilares-text">
                                        <h5>Excelência Operacional</h5>
                                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quaerat dicta asperiores, ipsa earum accusantium sapiente!</h6>
                                    </span>
                                </div>
                                <div class="col">
                                    <span class="quem-somos-pilares-number">04</span>
                                    <span class="quem-somos-pilares-text">
                                        <h5>Excelência Operacional</h5>
                                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quaerat dicta asperiores, ipsa earum accusantium sapiente!</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div id="quem-somos-indicadores" class="row bg-three">
                    <div class="col-xs-12 col-sm-12 col-md-4 text-center text-white p-3">
                        <h1 class="js-count fw-700"><span>79</span>%</h1>
                        <h6 class="fw-300">Empresas que <br> utilizam consultorias</h6>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 text-center text-white p-3">
                        <h1 class="js-count fw-700"><span>65</span>%</h1>
                        <h6 class="fw-300">Pequenas e <br> micros empresas</h6>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 text-center text-white p-3">
                        <h1 class="js-count fw-700"><span>15000</span>+</h1>
                        <h6 class="fw-300">Horas de consultoria <br> prestadas</h6>
                    </div>
                </div>
            </div>

        </div>

        <!-- SERVIÇOS -->
        <div id="servicos" class="container-fluid">

            <?php $count = 1; ?>
            <?php foreach ($listaServices as $service) : ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 <?= $count % 2 == 0 ? 'order-2' : 'order-1'; ?> p-0">
                        <?php if (!empty($service['image'])) : ?>
                            <img src="<?= 'data:image/jpg;base64,' . base64_encode($service['image']); ?>" class="img-fluid" alt="">
                        <?php endif; ?>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 <?= $count % 2 == 0 ? 'order-1' : 'order-2'; ?> p-0">
                        <div class="p-5">
                            <h5 class="fw-500"><?= $service['title']; ?></h5>
                            <h6 class="fw-300"><?= $service['description']; ?></h6>
                            <a class="fw-500" href="#">SABER MAIS <i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>

                </div>

                <?php $count++; ?>
            <?php endforeach; ?>
        </div>


        <!-- CONTATO -->
        <div id="contato" class="container">
            <div class="row mt-5 mb-5">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <h2 class="fw-500">CONTATO</h2>
                    <hr class="line">
                    <h6 class="fw-400">Informe os seus dados no formulário abaixo!</h6>

                    <!-- MENSAGENS DE ALERTA -->
                    <div class="alert alert-success alert-dismissible fade show oculta" role="alert">
                        <strong>Oba!</strong> Sua mensagem foi enviado com sucesso, entraremos em contato em breve.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="alert alert-danger alert-dismissible fade show oculta" role="alert">
                        <strong>Ops!</strong> <span> Não conseguimos receber o seu email, tente novamente mais tarde.</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                
                    <!-- Formulário de contato -->
                    <form class="mt-5 mb-5" method="POST">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome completo <span class="required">*</span></label>
                                    <input type="text" id="nome" class="form-control" name="nome" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="whats" class="form-label">WhatsApp <span class="required">*</span></label>
                                    <input type="text" id="whats" class="form-control" name="whats" placeholder="(DDD) 0000-0000" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="assunto" class="form-label">Assunto <span class="required">*</span></label>
                                    <input type="text" id="assunto" class="form-control" name="assunto" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="mensagem" class="form-label">Mensagem <span class="required">*</span></label>
                                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" id="btnEnviar" class="btn btn-default"><i class="fas fa-paper-plane"></i> ENVIAR MENSAGEM</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div id="contato-redes" class="col-xs-12 col-sm-12 col-md-6">
                    <table>
                        <tr>
                            <td>
                                <span>
                                    <strong class="color-one">Instagram:</strong> ectosoficial
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="align-middle">
                                    <strong class="color-one">Whatsapp:</strong> +55 (12) 3456-7890
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong class="color-one">Email:</strong> contato@ectos.com.br
                            </td>
                        </tr>
                    </table>

                    <div class="mt-3">
                        <h5 class="fw-400">Sobre a <strong>empresa</strong></h5>
                        <h6 class="fw-300">
                            A ectos é uma empresa de educação executiva focada no desenvolvimento de micro e pequenas empresas.
                            Elaboramos treinamentos específicos, acessíveis e com temas relevantes para o seu negócio, que irão tornar sua gestão mais assertiva e transformar os resultados de sua empresa.
                        </h6>
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

    <!-- Link do Counter Up -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="assets/libraries/counter-up/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <!-- Link do site -->
    <script src="assets/js/contadores.js"></script>
    <script src="assets/js/botaoTopo.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>