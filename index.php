<?php
// Inicia a sessão se ainda não houver uma
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Gera um token CSRF se não existir na sessão
if (empty($_SESSION['csrf_token'])) {
    // bin2hex(random_bytes(32)) cria uma string segura e aleatória
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Armazena o token em uma variável para fácil acesso no HTML
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/favicon.png" rel="apple-touch-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="assets/img/InsideTec.svg" alt="InsideTec Logo">
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
                      </li>
                    <li class="nav-item">
                       <a class="nav-link" href="pages/cases.php">Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contato</a>
                    </li>
                    <li class="nav-item">
                       </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="home" class="hero-section">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold text-white mb-4">Desenvolvimento de Aplicativos</h1>
                        <p class="lead text-white mb-4">Desenvolvemos a sua ideia ou seu aplicativo empresarial de forma eficaz</p>
                        <h5 class="text-white mb-4">Aplicativos nativos para Android e iOS</h5>
                        <a href="#services" class="btn btn-primary btn-lg me-3">Saiba mais detalhes</a>
                        <a href="#contact" class="btn btn-outline-light btn-lg">Fale Conosco</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-animation">
                            <div class="floating-icon">
                                <i class="fab fa-android fa-3x text-success"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="fab fa-apple fa-3x text-white"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="fas fa-mobile-alt fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="services-section py-5">
            <div class="container">
                <h2 class="text-center mb-5">Nossos Serviços</h2>
                
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h4>Desenvolvimento de Aplicativos</h4>
                            <p>Desenvolvemos a sua ideia ou seu aplicativo empresarial de forma eficaz</p>
                            <h6>Aplicativos nativos para Android e iOS</h6>
                            <div class="service-animation">
                                <div class="app-icons">
                                    <i class="fab fa-android"></i>
                                    <i class="fab fa-apple"></i>
                                </div>
                            </div>
                           </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <h4>Criação de Sites Responsivos</h4>
                            <p>Sites exclusivos e adaptados para diversas plataformas</p>
                            <div class="service-animation">
                                <div class="responsive-demo">
                                    <i class="fas fa-desktop"></i>
                                    <i class="fas fa-tablet-alt"></i>
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                            </div>
                           </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                      <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h4>Seu própio app de Delivery</h4>
                            <p>Tenha seu estabelecimento no smartphone de todos os seus clientes</p>
                            <h6>Disponível para Android, iOS e Site</h6>
                            <div class="service-animation">
                                <div class="delivery-icons">
                                    <i class="fas fa-shopping-cart"></i>
                                    <i class="fas fa-motorcycle"></i>
                                </div>
                            </div>
                          </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-share-alt"></i>
                            </div>
                            <h4>Gerenciamento de Mídias Sociais</h4>
                            <p>Apareça para milhares de pessoas que navegam nas redes sociais</p>
                            <h6>Acompanhe os resultados diariamente</h6>
                            <div class="service-animation">
                                <div class="social-icons">
                                    <i class="fab fa-facebook"></i>
                                    <i class="fab fa-instagram"></i>
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </div>
                           </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fab fa-google"></i>
                            </div>
                            <h4>Links Patrocinados - Google AdWords</h4>
                            <p>Aumente o faturamento mensal da sua empresa investindo no Google</p>
                            <h6>Posicionamento entre os 3 primeiros</h6>
                            <div class="service-animation">
                                <div class="adwords-demo">
                                    <i class="fas fa-chart-line"></i>
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                          </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-store"></i>
                            </div>
                            <h4>Lojas Virtuais</h4>
                            <p>Pensando em aumentar suas vendas? Criamos sua loja, layout moderno e pagamento seguro</p>
                            <div class="service-animation">
                                <div class="store-icons">
                                    <i class="fas fa-shopping-bag"></i>
                                    <i class="fas fa-credit-card"></i>
                                </div>
                            </div>
                           </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about-section py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="mb-4">A InsideTec - Desenvolvimento de Aplicativos POA/RS</h2>
                        <p class="lead mb-4">A InsideTec tem como principal objetivo levar sua empresa para o smartphone do público em geral.</p>
                        <p class="mb-4">Hoje são raros os momentos que não podemos observar alguém utilizando um smartphone ou tablet, seja na rua, restaurantes, bares, festas, etc. Segundo estudos o celular é o principal meio de acesso à internet no Brasil e uma parcela dos brasileiros teve seu primeiro acesso através de um smartphone ou outro dispositivo móvel.</p>
                        
                       <div class="about-platforms mb-4">
    <h5>Plataformas utilizadas pelos Brasileiros - Atualizada em 2024</h5>
    <div class="about-platforms-list">
        <div class="about-platforms-item">
            <i class="fab fa-android"></i>
            <span>Android</span>
        </div>
        <div class="about-platforms-item">
            <i class="fab fa-windows"></i>
            <span>Windows</span>
        </div>
        <div class="about-platforms-item">
            <i class="fab fa-apple"></i>
            <span>iOS</span>
        </div>
        <div class="about-platforms-item">
            <i class="fab fa-apple"></i> <span>Mac</span>
        </div>
    </div>
</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-questions">
                            <div class="question-card">
                                <h5>Qual objetivo busca alcançar com o aplicativo?</h5>
                                <p>É importante que o objetivo do aplicativo esteja bem definido. Lançar um aplicativo somente por lançar, pode não trazer os resultados esperados, com baixo número de downloads e pouco engajamento dos clientes.</p>
                            </div>
                            <div class="question-card">
                                <h5>Quais benefícios o aplicativo trará aos clientes?</h5>
                                <p>O aplicativo não deve ser apenas uma reprodução do conteúdo do site, deve trazer um benefício ao cliente. Este benefício pode ser através de conteúdo adicional, solucionar algum eventual problema, sempre melhorando a experiência do usuário.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="delivery" class="delivery-section py-5">
            <div class="container">
                <h2 class="text-center mb-5">App Delivery</h2>
                
                
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="feature-section">
                            <h4 class="mb-4">Usuário</h4>
                            <ul class="feature-list">
                                <li><i class="fas fa-check text-success"></i> Login, Cadastro e Recuperar Senha</li>
                                <li><i class="fas fa-check text-success"></i> Lista Completa do Cardápio separado por categorias</li>
                                <li><i class="fas fa-check text-success"></i> Remover ingredientes individualmente em cada lanche</li>
                                <li><i class="fas fa-check text-success"></i> Adição de ingredientes adicionais</li>
                                <li><i class="fas fa-check text-success"></i> Cadastramento de endereços para entrega</li>
                                <li><i class="fas fa-check text-success"></i> Edição completa do perfil</li>
                                <li><i class="fas fa-check text-success"></i> Carrinho de Compras com lanches selecionados</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-section">
                            <h4 class="mb-4">Administrador</h4>
                            <ul class="feature-list">
                                <li><i class="fas fa-check text-success"></i> Gerenciamento completo de categorias</li>
                                <li><i class="fas fa-check text-success"></i> Adição, edição e remoção de lanches</li>
                                <li><i class="fas fa-check text-success"></i> Adição, edição e remoção de ingredientes</li>
                                <li><i class="fas fa-check text-success"></i> Gerenciamento no cadastro de usuários</li>
                                <li><i class="fas fa-check text-success"></i> Acompanhamento de pedidos em tempo real</li>
                                <li><i class="fas fa-check text-success"></i> Cadastro de bairros e taxas de tele-entrega</li>
                                <li><i class="fas fa-check text-success"></i> Gerenciamento nas formas de pagamento</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="cases" class="cases-section py-5">
    <div class="container">
        <h2 class="text-center mb-3">Série - Cases de Sucesso</h2>
        <p class="text-center lead mb-5">Somos especialistas na criação de startups e aplicativos empresariais.</p>
        
        <div class="row g-4">
            
            <div class="col-lg-4 col-md-6">
                <div class="case-card">
                    <div class="portfolio-image-container">
                         <img src="assets/img/InovaShop.png" alt="Case do projeto Tele Mercado">
                    </div>
                    <div class="case-info">
                        <h5>Dropshipping</h5>
                        <p class="case-subtitle">Compras sem sair de casa</p>
                        <a href="https://05tkrr-ke.myshopify.com/" class="btn btn-primary btn-sm mt-3 half-width" target="_blank">Ver Projeto</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="case-card">
                    <div class="portfolio-image-container">
                        <img src="assets/img/cetepservicos.png" alt="Case do projeto Nettuno Trader & Kick Soccer Coin">
                    </div>
                    <div class="case-info">
                        <h5>Empresa segurança privada</h5>
                        <p class="case-subtitle">Projeto segurança</p>
                        <a href="https://www.cetepservicos.com.br/" class="btn btn-primary btn-sm mt-3 half-width" target="_blank">Ver Projeto</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="case-card">
                    <div class="portfolio-image-container">
                        <img src="assets/img/acalento.png" alt="Case do projeto Vecell Card">
                    </div>
                    <div class="case-info">
                        <h5>Portfolio</h5>
                        <p class="case-subtitle">Mais novo empreendimento em gramado</p>
                         <a href="https://darkred-sardine-144132.hostingersite.com/" class="btn btn-primary btn-sm mt-3 half-width" target="_blank">Ver Projeto</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

        <section id="contact" class="contact-section py-5">
            <div class="container">
                <h2 class="text-center mb-5">Entre em Contato</h2>
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="contactForm" action="php/contact.php" method="POST">

    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <input type="text" name="website" style="display:none;">

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nome *</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">E-mail *</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="col-md-6 mb-3">
            <label for="company" class="form-label">Empresa</label>
            <input type="text" class="form-control" id="company" name="company">
        </div>
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Assunto *</label>
        <input type="text" class="form-control" id="subject" name="subject" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Mensagem *</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
</form>
<div id="form-messages" class="mt-3"></div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h4 class="mb-4">Informações de Contato</h4>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h6>Endereço</h6>
                                    <p>Rua Otto Schmitt<br>
                                    Gramado<br>
                                    Serra Gaúcha</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h6>Telefone</h6>
                                    <p>(51) 99928-2430</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h6>E-mail</h6>
                                    <p>contactemrpires@gmail.com</p>
                                </div>
                            </div>
                            <div class="social-links mt-4">
                                <a href="https://github.com/emersonpires-dev" class="social-link"><i class="fab fa-github"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                               <a href="https://www.linkedin.com/in/emerson-pires-12481b2b4/" class="social-link"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> InsideTec - Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#client-area" class="text-light me-3">Área do Cliente</a>
                    <a href="#contact" class="text-light">Contato</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Seleciona o formulário pelo ID
        const contactForm = document.getElementById('contactForm');
        // Seleciona o container de mensagens pelo ID
        const formMessages = document.getElementById('form-messages');

        // Adiciona um "ouvinte" para o evento de 'submit' do formulário
        contactForm.addEventListener('submit', function(event) {
            
            // 1. Impede o comportamento padrão do navegador (que é recarregar a página)
            event.preventDefault();

            // 2. Coleta todos os dados do formulário
            const formData = new FormData(contactForm);

            // 3. Envia os dados para o seu script PHP usando a API Fetch
            fetch('php/contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Converte a resposta do PHP para JSON
            .then(data => {
                // 4. Usa a resposta recebida (data)
                if (data.success) {
                    // Se o envio foi um sucesso
                    formMessages.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    contactForm.reset(); // Limpa o formulário
                } else {
                    // Se houve um erro
                    let errorMessage = data.message;
                    if (data.errors) {
                        // Se houver uma lista de erros de validação
                        errorMessage = data.errors.join('<br>');
                    }
                    formMessages.innerHTML = `<div class="alert alert-danger">${errorMessage}</div>`;
                }
            })
            .catch(error => {
                // 5. Caso haja um erro de rede ou algo que impeça a comunicação
                console.error('Erro:', error);
                formMessages.innerHTML = `<div class="alert alert-danger">Ocorreu um erro ao tentar enviar a mensagem. Tente novamente.</div>`;
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/slider.js"></script>
</body>
</html>