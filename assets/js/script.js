jQuery(document).ready(function( $ ) {
    
    jQuery("#whats")
        .mask("(99) 9999-99999")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-9999");  
            } else {  
                element.mask("(99) 9999-99999");  
            }  
        });
 

    //FUNÇÃO PARA ENVIAR EMAIL INDEX
    let btnEnviar = document.getElementById("btnEnviar");
        btnEnviar.addEventListener('click', function() {
        let email = document.getElementsByName('email')[0].value
        let nome = document.getElementsByName('nome')[0].value
        let whats = document.getElementsByName('whats')[0].value
        let assunto = document.getElementsByName('assunto')[0].value
        let mensagem = document.getElementsByName('mensagem')[0].value

        if (email && nome && whats && assunto && mensagem) {
            $.ajax({
                type: "POST",
                url: "./assets/email.php",
                data: {
                    nome,
                    email,
                    whats,
                    assunto,
                    mensagem,
                    tipoEmail:1
                },
                success: function() {
                    document.querySelector('.alert-success').style.display = 'block';
                },
                error: function(error) {
                    document.querySelector('.alert-danger').style.display = 'block';
                    document.querySelector('.alert-danger').querySelector('span').innerHTML = "Verifique se seu E-mail é válido";
                },
                dataType: "JSON"
            });
        } else {
            alert("Por favor, preencha todos os campos corretamente!");
        }

    });
});



