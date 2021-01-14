jQuery(document).ready(function( $ ) {
    
    //CONTADORES
    $('.js-count > span').counterUp({
        delay: 10,
        time: 1000
    });

    // // BOTÃO VOLTAR AO TOPO
   $(".back-to-top").click(function() {
         $('html, body').animate({scrollTop:0}, 'slow');
    });
    
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn(200);
        } else {
            $('.back-to-top').fadeOut(200);
        }
    });
});