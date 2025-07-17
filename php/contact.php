<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
    exit;
}

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone
function validatePhone($phone) {
    $phone = preg_replace('/[^\d]/', '', $phone);
    return strlen($phone) >= 10 && strlen($phone) <= 15;
}

// Get form data
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
$company = isset($_POST['company']) ? sanitizeInput($_POST['company']) : '';
$subject = isset($_POST['subject']) ? sanitizeInput($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Nome é obrigatório';
}

if (empty($email)) {
    $errors[] = 'E-mail é obrigatório';
} elseif (!validateEmail($email)) {
    $errors[] = 'E-mail inválido';
}

if (!empty($phone) && !validatePhone($phone)) {
    $errors[] = 'Telefone inválido';
}

if (empty($subject)) {
    $errors[] = 'Assunto é obrigatório';
}

if (empty($message)) {
    $errors[] = 'Mensagem é obrigatória';
}

// Return errors if any
if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Prepare email content
$to = 'contato@app5m.com.br'; // Replace with your email
$email_subject = 'Novo contato do site App5M: ' . $subject;

$email_body = "
=== NOVO CONTATO DO SITE APP5M ===

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

// Email headers
$headers = "From: noreply@app5m.com.br\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
try {
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Log the contact (optional)
        logContact($name, $email, $phone, $company, $subject, $message);
        
        // Send auto-reply to user
        sendAutoReply($email, $name);
        
        echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao enviar mensagem. Tente novamente.']);
    }
} catch (Exception $e) {
    error_log("Contact form error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
}

// Function to log contact
function logContact($name, $email, $phone, $company, $subject, $message) {
    $log_file = 'contacts.log';
    $log_entry = date('Y-m-d H:i:s') . " | $name | $email | $phone | $company | $subject | " . str_replace(["\r", "\n"], [" ", " "], $message) . "\n";
    
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

// Function to send auto-reply
function sendAutoReply($user_email, $user_name) {
    $subject = 'Obrigado pelo contato - App5M';
    
    $message = "
Olá $user_name,

Obrigado por entrar em contato conosco!

Recebemos sua mensagem e nossa equipe entrará em contato em breve.

Atenciosamente,
Equipe App5M
Desenvolvimento de Aplicativos

---
App5M - Desenvolvimento de Aplicativos
Rua Silvio Silveira Soares, 2331 / Cavalhada - 91910-460
Porto Alegre/RS
Site: https://www.app5m.com.br
";

    $headers = "From: contato@app5m.com.br\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    mail($user_email, $subject, $message, $headers);
}

// Rate limiting (simple implementation)
function checkRateLimit($ip) {
    $rate_limit_file = 'rate_limit.json';
    $current_time = time();
    $limit_window = 3600; // 1 hour
    $max_requests = 10; // Max 10 requests per hour
    
    if (file_exists($rate_limit_file)) {
        $rate_data = json_decode(file_get_contents($rate_limit_file), true);
    } else {
        $rate_data = [];
    }
    
    // Clean old entries
    $rate_data = array_filter($rate_data, function($timestamp) use ($current_time, $limit_window) {
        return ($current_time - $timestamp) < $limit_window;
    });
    
    // Check if IP has exceeded limit
    $ip_requests = array_filter($rate_data, function($timestamp, $request_ip) use ($ip) {
        return $request_ip === $ip;
    }, ARRAY_FILTER_USE_BOTH);
    
    if (count($ip_requests) >= $max_requests) {
        return false;
    }
    
    // Add current request
    $rate_data[$ip . '_' . $current_time] = $current_time;
    
    // Save rate limit data
    file_put_contents($rate_limit_file, json_encode($rate_data));
    
    return true;
}

// Apply rate limiting
$client_ip = $_SERVER['REMOTE_ADDR'];
if (!checkRateLimit($client_ip)) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Muitas tentativas. Tente novamente mais tarde.']);
    exit;
}

// CSRF Protection (basic implementation)
function generateCSRFToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Validate CSRF token if present
if (isset($_POST['csrf_token'])) {
    if (!validateCSRFToken($_POST['csrf_token'])) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Token de segurança inválido']);
        exit;
    }
}

// Honeypot field (spam protection)
if (isset($_POST['website']) && !empty($_POST['website'])) {
    // This is likely spam - the honeypot field should be empty
    echo json_encode(['success' => false, 'message' => 'Erro de validação']);
    exit;
}

// Additional security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// Content Security Policy
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'");

// Log security events
function logSecurityEvent($event, $details) {
    $log_file = 'security.log';
    $log_entry = date('Y-m-d H:i:s') . " | " . $_SERVER['REMOTE_ADDR'] . " | $event | $details\n";
    
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

// Database storage (optional - requires database setup)
function storeContactInDatabase($name, $email, $phone, $company, $subject, $message) {
    /*
    // Example database storage
    $pdo = new PDO('mysql:host=localhost;dbname=app5m_contacts', $username, $password);
    
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, company, subject, message, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$name, $email, $phone, $company, $subject, $message]);
    */
}

// Webhook integration (optional)
function sendWebhook($data) {
    $webhook_url = 'https://your-webhook-url.com/contact';
    
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data)
        ]
    ];
    
    $context = stream_context_create($options);
    file_get_contents($webhook_url, false, $context);
}

// Clean up old log files (maintenance)
function cleanupLogs() {
    $log_files = ['contacts.log', 'security.log', 'rate_limit.json'];
    $max_age = 30 * 24 * 60 * 60; // 30 days
    
    foreach ($log_files as $file) {
        if (file_exists($file)) {
            if (time() - filemtime($file) > $max_age) {
                unlink($file);
            }
        }
    }
}

// Run cleanup occasionally
if (rand(1, 100) === 1) {
    cleanupLogs();
}

// Error handling and logging
function logError($message) {
    error_log("Contact Form Error: " . $message);
}

// Set error handler
set_error_handler(function($severity, $message, $file, $line) {
    logError("$message in $file on line $line");
});

// Set exception handler
set_exception_handler(function($exception) {
    logError($exception->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor']);
});
?>
