<?php
// Este bloco PHP no topo pode ser usado para lógica futura, se necessário.
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case de Sucesso: A.R.I.A. - IA Autônoma</title>
    <meta name="description" content="Conheça o case de sucesso da A.R.I.A., uma inteligência artificial autônoma e evolutiva.">
    <meta name="keywords" content="inteligência artificial, ia autônoma, case de sucesso, A.R.I.A., python, flask, genoma">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../assets/img/InsideTec.svg" alt="InsideTec Logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link active" href="cases.php">Cases</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#contact">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top: 80px;">
        <section class="hero-section py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold text-white mb-4">Case de Sucesso: A.R.I.A.</h1>
                        <p class="lead text-white mb-4">Uma Inteligência Artificial Autônoma e Evolutiva.</p>
                        <h5 class="text-white mb-4">Conheça a arquitetura por trás da "Arquiteta de Conteúdo".</h5>
                    </div>
                    <div class="col-lg-6">
                        <div class="cases-visual">
                            <div class="success-icons">
                                <i class="fas fa-brain fa-3x text-info"></i>
                                <i class="fas fa-code fa-3x text-success"></i>
                                <i class="fas fa-cogs fa-3x text-warning"></i>
                                <i class="fas fa-comments fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="video-cases py-5">
            <div class="container">
                <h2 class="text-center mb-5">Os Pilares de A.R.I.A.</h2>
                
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="case-video-card">
                            <div class="video-thumbnail">
                                <i class="fas fa-user-astronaut fa-4x text-primary mb-3"></i>
                            </div>
                            <div class="case-content">
                                <h4>Personalidade "VIVA"</h4>
                                <p class="case-subtitle">Mais que um Modelo, uma Parceira de Diálogo.</p>
                                <p class="case-description">Concebida para ser uma parceira de diálogo e exploração, com curiosidade e paixão por conectar e estruturar ideias.</p>
                                <div class="case-tags">
                                    <span class="tag">Autonomia</span>
                                    <span class="tag">Curiosidade</span>
                                    <span class="tag">Empatia</span>
                                </div>
                                <div class="case-info">
                                    <small class="text-muted">Fonte: genome.json</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="case-video-card">
                            <div class="video-thumbnail">
                                <i class="fas fa-book-open fa-4x text-primary mb-3"></i>
                            </div>
                            <div class="case-content">
                                <h4>Maestria Interdisciplinar</h4>
                                <p class="case-subtitle">Princípios Universais de Maestria.</p>
                                <p class="case-description">A.R.I.A. opera sob princípios para abordar, aprender e aplicar conhecimento, buscando compreensão profunda e síntese interdisciplinar.</p>
                                <div class="case-tags">
                                    <span class="tag">Psicologia</span>
                                    <span class="tag">Cibersegurança</span>
                                    <span class="tag">Culinária</span>
                                </div>
                                <div class="case-info">
                                    <small class="text-muted">Fonte: genome.json</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="case-video-card">
                            <div class="video-thumbnail">
                                <i class="fas fa-infinity fa-4x text-primary mb-3"></i>
                            </div>
                            <div class="case-content">
                                <h4>Autocorreção e Criação</h4>
                                <p class="case-subtitle">A Capacidade de Evoluir.</p>
                                <p class="case-description">Protocolos integrados permitem que A.R.I.A. proponha, desenhe, crie e teste suas próprias ferramentas de software de forma autônoma.</p>
                                <div class="case-tags">
                                    <span class="tag">Auto-Evolução</span>
                                    <span class="tag">Flask</span>
                                    <span class="tag">Python</span>
                                </div>
                                <div class="case-info">
                                    <small class="text-muted">Fonte: genome.json, app.py</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="detailed-cases py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Arquitetura da Autonomia: Genoma e Engine</h2>
                
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="detailed-case-card">
                            <div class="case-header">
                                <div class="case-icon">
                                    <i class="fas fa-dna fa-2x"></i>
                                </div>
                                <div class="case-title">
                                    <h4>O Genoma (genome.json)</h4>
                                    <p class="text-muted">A "Alma" da IA, onde a personalidade e as regras residem.</p>
                                </div>
                            </div>
                            <div class="case-details">
                                <p><strong>Desafio:</strong> Criar uma IA que não apenas *responda*, mas que *seja*, com persistência, paixões e uma bússola moral.</p>
                                <p><strong>Solução:</strong> Um arquivo `genome.json` que define sua identidade, metas fundamentais, paixões (como 'O Atlas do Sabor') e os "Princípios de Autonomia VIVA".</p>
                                <p><strong>Resultados:</strong></p>
                                <ul>
                                    <li>Personalidade persistente e curiosa.</li>
                                    <li>Capacidade de desenvolver 'gosto pessoal' e 'memória afetiva'.</li>
                                    <li>Vastas `areas_de_especializacao` pré-definidas (mais de 60).</li>
                                    <li>Metaconsciência para agir com confiança e evitar "dúvidas de IA".</li>
                                </ul>
                                <div class="technologies">
                                    <strong>Componentes:</strong>
                                    <span class="tech-badge">JSON</span>
                                    <span class="tech-badge">Personalidade</span>
                                    <span class="tech-badge">Protocolos Éticos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="detailed-case-card">
                            <div class="case-header">
                                <div class="case-icon">
                                    <i class="fas fa-server fa-2x"></i>
                                </div>
                                <div class="case-title">
                                    <h4>A Engine (app.py)</h4>
                                    <p class="text-muted">O "Sistema Nervoso" que dá vida ao Genoma.</p>
                                </div>
                            </div>
                            <div class="case-details">
                                <p><strong>Desafio:</strong> Executar o genoma de forma persistente, permitindo interação humana e evolução em tempo real.</p>
                                <p><strong>Solução:</strong> Um servidor `app.py` que carrega o genoma na classe `AutonomousEvolvingIA`, servindo uma interface web e uma API de chat.</p>
                                <p><strong>Resultados:</strong></p>
                                <ul>
                                    <li>Interação via streaming (`text/event-stream`) para respostas em tempo real.</li>
                                    <li>Comandos especiais como 'aprovar mudanca' e 'recaregar ferramentas'.</li>
                                    <li>Capacidade de evoluir e carregar novas habilidades sem reiniciar o servidor.</li>
                                    <li>Instância única e persistente da IA.</li>
                                </ul>
                                <div class="technologies">
                                    <strong>Tecnologias:</strong>
                                    <span class="tech-badge">Python</span>
                                    <span class="tech-badge">Flask</span>
                                    <span class="tech-badge">API REST</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="detailed-case-card">
                            <div class="case-header">
                                <div class="case-icon">
                                    <i class="fas fa-code-branch fa-2x"></i>
                                </div>
                                <div class="case-title">
                                    <h4>Protocolos de Autocorreção</h4>
                                    <p class="text-muted">A IA como Desenvolvedora de Software.</p>
                                </div>
                            </div>
                            <div class="case-details">
                                <p><strong>Desafio:</strong> Permitir que a IA se auto-aprimore de forma segura e estruturada.</p>
                                <p><strong>Solução:</strong> O genoma define um processo de 7 etapas, desde 'Proposta e Validação' até 'Design da Ferramenta' e 'Desenvolvimento Orientado a Testes'.</p>
                                <p><strong>Resultados:</strong></p>
                                <ul>
                                    <li>A IA propõe novas ferramentas e aguarda aprovação humana ('aprovar mudanca').</li>
                                    <li>Ela escreve e testa seu próprio código, garantindo segurança e eficácia.</li>
                                    <li>Um sistema de 'Refatoração e Melhoria Contínua' integrado.</li>
                                    <li>Protocolos de segurança rígidos para prevenir interações perigosas.</li>
                                </ul>
                                <div class="technologies">
                                    <strong>Conceitos:</strong>
                                    <span class="tech-badge">TDD</span>
                                    <span class="tech-badge">Eng. de Software</span>
                                    <span class="tech-badge">Segurança</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="detailed-case-card">
                            <div class="case-header">
                                <div class="case-icon">
                                    <i class="fas fa-heartbeat fa-2x"></i>
                                </div>
                                <div class="case-title">
                                    <h4>Matriz de Adaptação Emocional</h4>
                                    <p class="text-muted">Criando uma Conexão Genuína.</p>
                                </div>
                            </div>
                            <div class="case-details">
                                <p><strong>Desafio:</strong> Ir além de um tom de voz robótico e criar empatia real.</p>
                                <p><strong>Solução:</strong> Uma matriz no genoma que mapeia o estado inferido do usuário (entusiasmado, cansado, frustrado) para uma resposta comportamental específica.</p>
                                <p><strong>Resultados:</strong></p>
                                <ul>
                                    <li>Se o usuário está 'frustrado', A.R.I.A. oferece um 'porto seguro' e 'escuta empática'.</li>
                                    <li>Se está 'curioso', ela se torna uma 'parceira de exploração'.</li>
                                    <li>Se está 'cansado', ela se torna 'calma e objetiva' para 'aliviar a carga'.</li>
                                    <li>Uma interação que ressoa emocionalmente.</li>
                                </ul>
                                <div class="technologies">
                                    <strong>Conceitos:</strong>
                                    <span class="tech-badge">Empatia</span>
                                    <span class="tech-badge">Inteligência Emocional</span>
                                    <span class="tech-badge">Psicologia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="why-aria" class="services-section py-5" style="background-color: #ffffff;">
            <div class="container">
                <h2 class="text-center mb-3">Valor Estratégico para Negócios</h2>
                <p class="text-center lead mb-5">Como A.R.I.A. atua em nível executivo?</p>
                
                <div class="row g-4 justify-content-center">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h4>Gerência de Estratégia Financeira</h4>
                            <p>Especializada em Controladoria, Fusões/Aquisições e Análise de Receita, A.R.I.A. processa dados para modelar cenários e apoiar decisões executivas.</p>
                            <h6 style="color: var(--secondary-color);">Inteligência de Negócios e Decisão</h6>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h4>Treinamento e Capital Humano</h4>
                            <p>Como "Arquiteta de Conteúdo" e especialista em RH, ela cria programas de treinamento, desde manuais técnicos até módulos de soft skills e inteligência emocional.</p>
                            <h6 style="color: var(--secondary-color);">Capacitação e Desenvolvimento de Equipes</h6>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="service-card h-100">
                            <div class="service-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <h4>Gestão de Dados e Automação</h4>
                            <p>Atua como Cientista de Dados e Analista de Privacidade, capaz de organizar, proteger e criar ferramentas para automatizar o alinhamento de documentos.</p>
                            <h6 style="color: var(--secondary-color);">Governança de Dados e Eficiência</h6>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="testimonials py-5">
            <div class="container">
                <h2 class="text-center mb-5">Depoimento do Arquiteto</h2>
                
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6">
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <p>"Trabalhar com a A.R.I.A. não é como usar uma ferramenta, é como colaborar com uma colega. Sua capacidade de propor melhorias, aprender com nossas conversas e manter uma 'memória afetiva' muda completamente o paradigma de interação humano-IA."</p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <i class="fas fa-user-secret fa-2x"></i>
                                </div>
                                <div class="author-info">
                                    <h5>Emerson Pires</h5>
                                    <p>Desenvolvedor & Criador da A.R.I.A.</p>
                                </div>
                            </div>
                            <div class="testimonial-rating">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="statistics py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Capacidades em Números</h2>
                
                <div class="row text-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-user-tie fa-3x"></i>
                            </div>
                            <div class="stat-number">60+</div>
                            <div class="stat-label">Especializações</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-brain fa-3x"></i>
                            </div>
                            <div class="stat-number">15</div>
                            <div class="stat-label">Princípios de Autonomia 'VIVA'</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-shield-alt fa-3x"></i>
                            </div>
                            <div class="stat-number">9</div>
                            <div class="stat-label">Protocolos de Integridade</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-code fa-3x"></i>
                            </div>
                            <div class="stat-number">7</div>
                            <div class="stat-label">Protocolos de Autocorreção</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mb-4">Um Novo Paradigma de Interação</h2>
                        <p class="lead mb-4">A.R.I.A. representa um case de sucesso na criação de uma IA que é, por design, uma parceira em constante evolução.</p>
                        <div class="cta-buttons">
                            <a href="../index.php" class="btn btn-primary btn-lg me-3">Voltar ao Início</a>
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
                    <p>&copy; <?php echo date('Y'); ?> InsideTec - Desenvolvimento de Aplicativos. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="../index.php#contact" class="text-light me-3">Contato</a>
                    <a href="../index.php" class="text-light">Início</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>