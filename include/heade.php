<?php
// Inicia a sessão para podermos usar o token
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gera o token de segurança
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InsideTec - Desenvolvimento de Aplicativos Porto Alegre/RS</title>
    <meta name="description" content="Criação de apps, lojas virtuais, desenvolvimento de aplicativos em Porto Alegre. Aplicativos nativos para Android e iOS.">
    <meta name="keywords" content="criação de apps, criação de aplicativos, lojas virtuais, desenvolvimento de aplicativos, aplicativos, aplicativos móveis, android, ios, windows phone, poa, rs">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="assets/img/logos.png" alt="InsideTec Logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/services.php">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/about.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                      <!--  <a class="nav-link" href="pages/delivery.html">Seu app de Delivery</a>-->
                    </li>
                    <li class="nav-item">
                     <!--   <a class="nav-link" href="pages/cases.html">Cases</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contato</a>
                    </li>
                    <li class="nav-item">
                       <!-- <a class="nav-link" href="#client-area">Área do Cliente</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>