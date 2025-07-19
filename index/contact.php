<!-- Contact Section -->
        <section id="contact" class="contact-section py-5">
            <div class="container">
                <h2 class="text-center mb-5">Entre em Contato</h2>
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="contactForm" action="php/contact.php" method="POST">
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
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h4 class="mb-4">Informações de Contato</h4>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h6>Endereço</h6>
                                    <p>Rua Silvio Silveira Soares, 2331<br>Cavalhada - 91910-460<br>Porto Alegre/RS</p>
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
                               <!-- <a href="#" class="social-link"><i class="fab fa-youtube"></i></a> -->
                                <a href="https://www.linkedin.com/in/emerson-pires-12481b2b4/" class="social-link"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>