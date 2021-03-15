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
        $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
        $assunto = filter_input(INPUT_POST, 'assunto');
        $mensagem =  filter_input(INPUT_POST, 'mensagem');
        
        if(!$email){
           echo json_encode(false);
        }

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

//PUXANDO CONEXÃO COM O BANCO 
require '../assets/includes/conection.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $sql = $pdo->query("SELECT * FROM parameters");
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $lista[0]['servidor'];                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $lista[0]['usuario'];                     // SMTP username
    $mail->Password   = $lista[0]['senha'];                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $lista[0]['porta'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contato@camilamoreira.com.br', 'Camila');
    $mail->addAddress($emailDestinatario, $nome);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo json_encode(true);
} catch (Exception $e) {
    echo json_encode(true);
}
