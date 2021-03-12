<?php
require 'assets/includes/functions.php';
$idCurso = filter_input(INPUT_GET, 'idCurso');
$categoria = filter_input(INPUT_GET, 'cat');
$detalheCourse = getCourseDetalhe($idCurso);

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
                        <span class="insta-mobile"> Instagram </span> 
                    </a>  
                    </li>
                    <li class="nav-item">
                    <span>
                        <a href="mailto:contato@ectos.com.br" class="nav-link">
                            <i class="far fa-envelope"></i> 
                            <span class="email-mobile"> E-mail </span> 
                        </a>
                    </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="detalhes-curso" class="container-fluid mb-5">
        <div id="header-img" style="background-image:url(<?=$detalheCourse['curso'][0]['banner'];?>)"></div>
        <div id="name-course"><span><?= $detalheCourse['curso'][0]['title']; ?></span></div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">
                        <i class="fas fa-chalkboard-teacher fa-3x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h5>Professor</h5>
                        <h6 class="fw-300"><?= $detalheCourse['curso'][0]['teacher']; ?></h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">
                        <i class="fas fa-certificate fa-3x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h5>Certificado por</h5>
                        <h6 class="fw-300"><?= $detalheCourse['curso'][0]['certificate']; ?></h6>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="item-icon">
                        <i class="fas fa-clock fa-3x color-three"></i>
                    </div>
                    <div class="item-desc">
                        <h5>Carga Horária</h5>
                        <h6 class="fw-300"><?= $detalheCourse['curso'][0]['hours']; ?> h</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="item-desc">
                        <h5>Público Alvo</h5>
                        <h6 class="fw-300"><?= $detalheCourse['curso'][0]['audience']; ?></h6>
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
            <?php $contador = 3; ?>
            <?php foreach ($detalheCourse['conteudo'] as $conteudo) : ?>
                <?php if ($contador == 3) : ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="item-icon">
                                <i class="fas fa-check fa-2x color-three"></i>
                            </div>
                            <div class="item-desc">
                                <h6 class="fw-300"><?= $conteudo['description']; ?></h6>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="item-icon">
                                <i class="fas fa-check fa-2x color-three"></i>
                            </div>
                            <div class="item-desc">
                                <h6 class="fw-300"><?= $conteudo['description']; ?></h6>
                            </div>
                        </div>
                        <?php if ($contador == 2) : ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php $contador == 3 ? $contador = 0 : $contador = $contador; ?>
            <?php $contador++; ?>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="item-desc">
                    <h5>Módulos</h5>
                </div>
            </div>
        </div>
        <div id="tbl-mod" class="row">
            <div class="col">
                <?php $contador = 0; ?>
                <?php foreach ($detalheCourse['modulos'] as $modulo) : ?>
                    <?php $contador++; ?>
                    <table class="table table-bordered">
                        <tr>
                            <td><strong><?= $contador . ". "; ?></strong><?= $modulo['description']; ?></td>
                            <td class="text-center" style="width: 100px;"><?= $modulo['hours'] . " h"; ?></td>
                        </tr>
                    </table>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row" style="display:<?= $categoria != 1 ? 'none;' : 'flex;'; ?>">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="item-desc">
                    <h5 class="fw-700">Preencha seus dados para receber informações de orçamento:</h5>
                </div>
            </div>
        </div>
        <div id="form-orcamento" style="display:<?= $categoria != 1 ? 'none;' : 'block;'; ?>">
            <!-- MENSAGENS DE ALERTA -->
            <div class="alert alert-success alert-dismissible fade show oculta" role="alert">
                <strong>Oba!</strong> Recebemos o seu email de solicitação do curso, assim que possível retornamos o contato.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-danger alert-dismissible fade show oculta" role="alert">
                <strong>Ops!</strong> Não conseguimos receber o seu email, tente novamente mais tarde.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


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
                <div class="row mt-2">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <label for="" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <label for="" class="form-label">Qtd.:</label>
                        <input type="number" class="form-control" id="qtd">
                    </div>
                </div>
            </form>
        </div>
        <div id="box-comprar" class="row">
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 d-grid">
                <a href="cursos.php" type="button" id="btnVoltar" class="btn btn-default">
                    <i class="fas fa-backward"></i> VOLTAR
                </a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 d-grid">
                <a href="<?= $detalheCourse['curso'][0]['link']; ?>" type="button" id="btnComprar" class="btn btn-default" style="display:<?= $categoria == 2 ? 'block;' : 'none;'; ?>">
                    <i class="fas fa-cart-plus"></i> COMPRAR
                </a>
                <button type="button" data-curso='<?= $detalheCourse['curso'][0]['title']; ?>' id="btnSolicitar" class="btn btn-default" style="display:<?= $categoria != 1 ? 'none;' : 'block;'; ?>">
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

    <script>
        var h = '-' + document.getElementById('name-course').offsetHeight + 'px';
        document.getElementById('name-course').style.marginTop = h;

            if( document.getElementById('btnSolicitar')){
            document.getElementById('btnSolicitar').addEventListener("click", function(e) {
                let nome = document.getElementById('nome').value;
                let email = document.getElementById('email').value;
                let whats = document.getElementById('whatsapp').value;
                let qtd = document.getElementById('qtd').value;
                let curso = document.getElementById('btnSolicitar').getAttribute('data-curso');
                let emailValido = null;

                //VALIDANDO E-MAIL
                var re = /\S+@\S+\.\S+/;
                emailValido = re.test(email);
              

                if(emailValido){
                $.ajax({
                    type: "POST",
                    url: "./assets/email.php",
                    data: {
                        nome,
                        email,
                        whats,
                        qtd,
                        curso,
                        tipoEmail: 3
                    },
                    success: function() {
                        document.querySelector('.alert-success').style.display = 'block';
                    },
                    error: function(error) {
                        document.querySelector('.alert-danger').style.display = 'block';
                    },
                    dataType: "html"
                }) 
              } else {
               let error =  document.querySelector('.alert-danger');
               error.style.display = 'block';
               error.querySelector('strong').innerText = "Ops! e-mail inválido"
              }
            })
        } 
    </script>

      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/604bb78f067c2605c0b7cde4/1f0jsa2i5';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>