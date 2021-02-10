<?php
//PEGANDO TIPO DE EMAIL 
$tipoEmail = filter_input(INPUT_POST, 'tipoEmail');
$mensagem; 
$assunto;
$emailDestinatario;
switch ($tipoEmail) {

    case 1:
        //PEGANDO DADOS 
        $nome = filter_input(INPUT_POST, 'nome');
        $whatsaap = filter_input(INPUT_POST, 'whats');
        $email = filter_input(INPUT_POST, 'email');
        $assunto = filter_input(INPUT_POST, 'assunto');
        $mensagem =  filter_input(INPUT_POST, 'mensagem');

        $emailDestinatario = $email;
    break;

    case 2:
        $nome = filter_input(INPUT_POST, 'nome');
        $whatsaap = filter_input(INPUT_POST, 'whats');    
        $email = filter_input(INPUT_POST, 'email');
        $quantidade = filter_input(INPUT_POST,'qtd');
        $curso =  filter_input(INPUT_POST,'curso');

        $assunto = utf8_decode("Solicitação orçamento");
        $mensagem = "Solicitação de orçamento para arquivo.<br><br> Email: ".$email." <br> WhatsApp: ".$whatsaap." <br> Nome do arquivo: ".$curso." <br> Quantidade: ".$quantidade;

        $emailDestinatario = 'contato@camilamoreira.com.br';
    break;    

    case 3:
        $nome = filter_input(INPUT_POST, 'nome');
        $whatsaap = filter_input(INPUT_POST, 'whats');    
        $email = filter_input(INPUT_POST, 'email');
        $quantidade = filter_input(INPUT_POST,'qtd');
        $curso =  filter_input(INPUT_POST,'curso');

        $assunto = utf8_decode("Solicitação de compra curso");
        $mensagem = "Solicitação de compra para curso: <br><br> Email: ".$email." <br> WhatsApp: ".$whatsaap." <br> Nome do curso: ".$curso." <br> Quantidade: ".$quantidade;

        $emailDestinatario = 'contato@camilamoreira.com.br';
    break;

}


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.camilamoreira.com.br';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contato@camilamoreira.com.br';                     // SMTP username
    $mail->Password   = 'm4nz0l1@';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contato@camilamoreira.com.br', 'Camila');
    $mail->addAddress($emailDestinatario, $nome);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro no envio";
}
