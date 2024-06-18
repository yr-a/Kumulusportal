<?php
// Altere a variável abaixo colocando o seu email
$destinatario = "kumuluslibras@gmail.com";

// Verifica se os campos foram enviados
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $mensagem = $_POST['mensagem'];
    $assunto = "Reserva";

    // Monta o e-mail na variável $body
    $body = "===================================\n";
    $body .= "FORMULÁRIO DE RESERVA\n";
    $body .= "===================================\n\n";
    $body .= "Nome: " . $nome . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Telefone: " . $telefone . "\n";
    $body .= "Mensagem: " . $mensagem . "\n\n";
    $body .= "===================================\n";

    // Define os headers do e-mail
    $headers = "From: $email\r\n" . 
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envia o e-mail
    if(mail($destinatario, $assunto, $body, $headers)) {
        // Redireciona para a página de obrigado
        header("Location: obrigado.html");
    } else {
        echo "Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
    }
} else {
    echo "Por favor, preencha todos os campos obrigatórios.";
}
exit;
?>
