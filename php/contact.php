<?php
// ==========================================================
// 1. CARREGAMENTO DE DEPENDÊNCIAS (PHPMailer)
// ==========================================================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// ==========================================================
// 2. DEFINIÇÃO DE TODAS AS FUNÇÕES
// ==========================================================

// Função para limpar e proteger os dados de entrada
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Função para validar o formato do e-mail
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar o formato do telefone
function validatePhone($phone) {
    $phone = preg_replace('/[^\d]/', '', $phone);
    return strlen($phone) >= 10 && strlen($phone) <= 15;
}

// Função para registrar o contato em um arquivo de log
function logContact($name, $email, $phone, $company, $subject, $message) {
    $log_file = 'contacts.log';
    $log_entry = date('Y-m-d H:i:s') . " | $name | $email | $phone | $company | $subject | " . str_replace(["\r", "\n"], [" ", " "], $message) . "\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

// Função para enviar uma resposta automática para o usuário USANDO PHPMailer
function sendAutoReply(PHPMailer $mailer, $user_email, $user_name) {
    // Limpa os destinatários e "reply-to" anteriores
    $mailer->clearAddresses();
    $mailer->clearReplyTos();

    // Configura o e-mail para o usuário
    $mailer->addAddress($user_email, $user_name);
    $mailer->Subject = 'Obrigado pelo seu contato - InsideTec';
    $mailer->Body    = "
Olá $user_name,

Obrigado por entrar em contato conosco!

Recebemos sua mensagem e nossa equipe entrará em contato em breve.

Atenciosamente,
Equipe InsideTec
Desenvolvimento de Sistemas

---
InsideTec - Desenvolvimento de Aplicativos
Rua Otto Schmitt, 140 / Gramado - Gramado/RS
Site: https://www.insidetec.com.br
";

    // Envia o e-mail de resposta automática
    $mailer->send();
}

// Função para verificar o limite de envios por IP (Rate Limiting)
function checkRateLimit($ip) {
    $rate_limit_file = 'rate_limit.json';
    $current_time = time();
    $limit_window = 3600; // 1 hora
    $max_requests = 10;   // Máximo de 10 requisições por hora
    
    $rate_data = file_exists($rate_limit_file) ? json_decode(file_get_contents($rate_limit_file), true) : [];

    $rate_data = array_filter($rate_data, function($timestamp) use ($current_time, $limit_window) {
        return ($current_time - $timestamp) < $limit_window;
    });

    $ip_requests = array_filter($rate_data, function($request_ip) use ($ip) {
        return $request_ip === $ip;
    }, ARRAY_FILTER_USE_KEY);
    
    if (count($ip_requests) >= $max_requests) {
        return false;
    }

    $rate_data[$ip . '_' . $current_time] = $current_time;
    file_put_contents($rate_limit_file, json_encode($rate_data));
    return true;
}

// Função para validar o token de segurança CSRF
function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Função para registrar erros
function logError($message) {
    error_log("Contact Form Error: " . $message);
}

// ==========================================================
// 3. LÓGICA PRINCIPAL DO SCRIPT
// ==========================================================

header('Content-Type: application/json');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
    exit;
}

// --- VALIDAÇÕES DE SEGURANÇA PRIMEIRO ---

if (isset($_POST['website']) && !empty($_POST['website'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Erro de validação.']);
    exit;
}

if (isset($_POST['csrf_token']) && validateCSRFToken($_POST['csrf_token'])) {
    // Token é válido
} else {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Token de segurança inválido ou ausente']);
    exit;
}

if (!checkRateLimit($_SERVER['REMOTE_ADDR'])) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Muitas tentativas. Tente novamente mais tarde.']);
    exit;
}

// --- SE PASSOU EM TUDO, PROCESSA OS DADOS ---

$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
$company = isset($_POST['company']) ? sanitizeInput($_POST['company']) : '';
$subject = isset($_POST['subject']) ? sanitizeInput($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Validação dos campos
$errors = [];
if (empty($name)) { $errors[] = 'Nome é obrigatório'; }
if (empty($email)) { $errors[] = 'E-mail é obrigatório'; } elseif (!validateEmail($email)) { $errors[] = 'E-mail inválido'; }
if (!empty($phone) && !validatePhone($phone)) { $errors[] = 'Telefone inválido'; }
if (empty($subject)) { $errors[] = 'Assunto é obrigatório'; }
if (empty($message)) { $errors[] = 'Mensagem é obrigatória'; }

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Prepara o conteúdo do e-mail
$email_subject = 'Novo contato do site InsideTec: ' . $subject;
$email_body = "
=== NOVO CONTATO DO SITE InsideTec ===

Nome: $name
E-mail: $email
Telefone: $phone
Empresa: $company
Assunto: $subject

Mensagem:
$message

=== INFORMAÇÕES ADICIONAIS ===
IP: " . $_SERVER['REMOTE_ADDR'] . "
User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "
Data/Hora: " . date('d/m/Y H:i:s') . "
";

// Cria uma nova instância do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP para Gmail
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contactemrpires@gmail.com';
    $mail->Password   = 'powb wdlp zxtg ojqf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Remetente e Destinatário
    $mail->setFrom('contactemrpires@gmail.com', 'Site InsideTec');
    $mail->addAddress('contactemrpires@gmail.com', 'Contato EMR');
    $mail->addReplyTo($email, $name);

    // Conteúdo
    $mail->isHTML(false);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $email_subject;
    $mail->Body    = $email_body;

    // ... (configuração e envio do primeiro e-mail) ...
    $mail->send();

    // Se o e-mail foi enviado com sucesso
    logContact($name, $email, $phone, $company, $subject, $message);
    
    // Altere a linha abaixo para passar o objeto $mail
    sendAutoReply($mail, $email, $name); 
    
    echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);

} catch (Exception $e) {
    // ...
}