//FUNÇÃO DO MODAL FREE
jQuery(document).ready(function($) {
    let btnDetalheFree = document.querySelector(".btnDetalheFree");
    let btnDetalhePago = document.querySelector(".btnDetalhePago");

    let modalDetalhesFree = new bootstrap.Modal(document.getElementById("modal-arquivo-free"), {});
    let modalDetalhesPago = new bootstrap.Modal(document.getElementById("modal-arquivo-pago"), {});
    
    try {
    btnDetalheFree.addEventListener("click", function(e) {

        $('#imgs-galeria-free #dow-galeria').not('.modelDow').remove();
        
        let idCurso = e.target.getAttribute('data-id-curso')

        $.ajax({
            type: "POST",
            url: "assets/detalhesCurso.php",
            dataType: "json",
            data: {
                idCurso
            },
            success: function(response) {
                document.querySelector('.m-title').innerText = response.nome;
                document.querySelector('.m-description').innerText = response.descricao;
                document.querySelector('.m-link').setAttribute('href', response.link);
                document.querySelector('.m-size').innerText = response.tamanho;
                document.querySelector("#btnBaixarFree").setAttribute("idCurso",idCurso);
                let imagens = response.imagens;

                if (imagens) {
                    let galeriaFree = document.querySelector("#imgs-galeria-free");
                    let imgsModal = document.querySelector("#imgs-galeria-free .modelDow").cloneNode(true);
                    imgsModal.classList.remove('modelDow');
                    imgsModal.style.display = "flex";
                    galeriaFree.append(imgsModal);

                    let contador = 0;
                    for (let i = 0; i < imagens.length; i++) {

                        if (contador == 3) {
                            imgsModal = document.querySelector('#imgs-galeria-free .modelDow').cloneNode(true);
                            imgsModal.classList.remove('modelDow');
                            imgsModal.style.display = "flex";
                            document.querySelector('#imgs-galeria-free').append(imgsModal);
                            contador = 0;
                        }

                        let urlImg = 'data:image/jpg;base64,' + imagens[i];
                        let img = $('#imgs-galeria-free #dow-galeria:not(.modelDow) img')[i];
                        img.setAttribute('src', urlImg);
                        img.classList.add('showImage');

                        contador++;
                    }

                    $('#imgs-galeria-free #dow-galeria:not(.modelDow) img:not(.showImage)').remove();

                } else {
                    document.querySelector("#imgs-galeria-free .modelDow").style.display = "flex";
                }

                modalDetalhesFree.show();
            },
            error: function(error) {
                console.log('error');
            }
        });

    }, false);
} catch(e) {


}




    //ENVIAR EMAIL MODAL PAGO 
    document.getElementById('BtnSolicitarOrcamento').addEventListener("click", function(e) {

        let curso = document.querySelector("#modal-arquivo-pago").querySelector(".title-pago").innerText
        let nome = document.getElementsByName('nome')[0].value
        let whats = document.getElementsByName('whats')[0].value
        let email = document.getElementsByName('email')[0].value
        let qtd = document.getElementsByName('qtd')[0].value

        if (email && nome && whats && qtd) {
            $.ajax({
                type: "POST",
                url: "./assets/email.php",
                data: {
                    nome,
                    email,
                    whats,
                    qtd,
                    curso,
                    tipoEmail: 2
                },
                success: function() {
                    document.querySelector('.alert-success').style.display = 'block';
                },
                error: function(error) {
                    document.querySelector('.alert-danger').style.display = 'block';
                },
                dataType: "html"
            });
        } else {
            alert("Por favor, preencha todos os campos corretamente!");
        }



    });




    //MODAL PAGO 
    btnDetalhePago.addEventListener("click", function(e) {
        $.ajax({
            type: "POST",
            url: "assets/detalhesCurso.php",
            dataType: "json",
            data: {
                idCurso: e.target.getAttribute('data-id-curso')
            },
            success: function(response) {
                let modal = document.querySelector("#modal-arquivo-pago");
                modal.querySelector(".title-pago").innerText = response.nome;
                modal.querySelector('.description-pago').innerText = response.descricao;
                modal.querySelector('.size-pago').innerText = response.tamanho;
                let imagens = response.imagens;

                if (imagens) {
                    let galeriaFree = document.querySelector("#imgs-galeria-pago");
                    let imgsModal = document.querySelector("#imgs-galeria-pago .modelDow").cloneNode(true);
                    imgsModal.classList.remove('modelDow');
                    imgsModal.style.display = "flex";
                    galeriaFree.append(imgsModal);

                    let contador = 0;
                    for (let i = 0; i < imagens.length; i++) {

                        if (contador == 3) {
                            imgsModal = document.querySelector('#imgs-galeria-pago .modelDow').cloneNode(true);
                            imgsModal.classList.remove('modelDow');
                            imgsModal.style.display = "flex";
                            document.querySelector('#imgs-galeria-pago').append(imgsModal);
                            contador = 0;
                        }

                        let urlImg = 'data:image/jpg;base64,' + imagens[i];
                        let img = $('#imgs-galeria-pago #dow-galeria:not(.modelDow) img')[i];
                        img.setAttribute('src', urlImg);
                        img.classList.add('showImage');

                        contador++;
                    }

                    $('#imgs-galeria-pago #dow-galeria:not(.modelDow) img:not(.showImage)').remove();

                } else {
                    document.querySelector("#imgs-galeria-pago .modelDow").style.display = "flex";
                }

                modalDetalhesPago.show();
            },
            error: function(error) {
                console.log('error');
            }
        });
    })


    //BOTÃO DE DOWLOAD FREE
    let btnBaixarFree = document.querySelector("#btnBaixarFree");
    btnBaixarFree.addEventListener("click", function(e) {
         
        let idCurso = document.querySelector("#btnBaixarFree").getAttribute("idcurso");

        $.ajax({
                type: "POST",
                url: "./assets/UpdateAmountDowload.php",
                data: {
                   id:idCurso
                },
                success: function() {
                    
                },
                error: function(error) {
                   
                },
                dataType: "html"
            });
    })    

});
