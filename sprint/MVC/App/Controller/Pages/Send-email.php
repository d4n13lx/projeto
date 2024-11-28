<?php
require "../../../../vendor/autoload.php";
require "config.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = MAILHOST;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        $this->mail->Username = USERNAME;
        $this->mail->Password = PASSWORD;
    }

    public function send($name, $email, $subject, $message)
    {
        try {
            // Configura o remetente
            $this->mail->setFrom(USERNAME, 'No Reply');
            $this->mail->addAddress(USERNAME); // Endereço de destino
            $this->mail->addReplyTo($email, $name);

            // Configura o corpo do e-mail
            $formattedMessage = "
                <p><strong>Nome:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Mensagem:</strong></p>
                <p>" . nl2br(htmlspecialchars($message)) . "</p>
            ";

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $formattedMessage;
            $this->mail->AltBody = strip_tags($formattedMessage); // Corpo em texto simples para clientes de e-mail que não suportam HTML

            $this->mail->send();
            return "Success";
        } catch (Exception $e) {
            return "Email não enviado. Erro: " . $this->mail->ErrorInfo;
        }
    }
}

class FormHandler
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Sanitiza e valida os dados
            $name = htmlspecialchars(trim($_POST['name'] ?? ''));
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
            $message = htmlspecialchars(trim($_POST['message'] ?? ''));

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 'Email inválido.';
            }

            $response = $this->mailer->send($name, $email, $subject, $message);

            return $response;
        }
        return 'Formulário não enviado.';
    }
}

// Inicializa o Mailer e o FormHandler
$mailer = new Mailer();
$formHandler = new FormHandler($mailer);

// Manipula a requisição
$response = $formHandler->handleRequest();

// Exibe a resposta
if ($response === "Success") {
    echo '<p class="success">Email enviado com sucesso.</p>';
} else {
    echo '<p class="error">' . htmlspecialchars($response) . '</p>';
}
?>
