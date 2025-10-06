<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    /* Centro vertical da página */
    html,
    body {
        height: 100%;
        background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
    }

    .card {
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(13, 38, 59, 0.08);
    }

    .form-control:focus {
        box-shadow: none;
    }

    /* Logo placeholder */
    .brand {
        width: 56px;
        height: 56px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1.1rem;
        color: white;
        background: linear-gradient(90deg, #4f46e5, #06b6d4);
    }
    </style>
</head>

<body>

    <main class="d-flex align-items-center min-vh-100 py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-5">
                    <div class="card p-4">

                        <div class="text-center mb-4">
                            <div class="brand mx-auto mb-2">A</div>
                            <h4 class="mb-0">Crie sua conta</h4>
                        </div>
                        <!--Help:Para fazer o form passar os dados é necessário "method='post'" e "action='<?= site_url('login/autenticar') ?>'" para o método presente no controller-->
                        <!--Help:Os valores para pegar pelo método é definido pelo name atribuído ao input-->
                        <form id="loginForm" class="needs-validation" method='post'
                            action='<?= site_url('cadastro/autenticar') ?>' novalidate>
                            <!--Help:Div para mostrar erros passados pelo flashdata-->
                            <?php show_flash($this); ?>
                            <!-- Email / Usuário -->
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="email-addon"><i
                                            class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                        placeholder="seu@exemplo.com" aria-describedby="email-addon" required>
                                    <div class="invalid-feedback">
                                        Insira um email válido.
                                    </div>
                                </div>
                            </div>

                            <!-- Senha -->
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="inputPassword" name="password"
                                        placeholder="••••••••" required minlength="6" aria-describedby="passwordHelp">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword"
                                        aria-label="Mostrar senha">
                                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                                    </button>
                                    <div class="invalid-feedback">
                                        A senha deve ter pelo menos 6 caracteres.
                                    </div>
                                </div>
                                <div class="form-text" id="passwordHelp">Mínimo 6 caracteres.</div>
                            </div>

                            <!-- Botão -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Cadastrar
                                </button>
                            </div>

                        </form>

                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS bundle (Popper incluído) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Validação Bootstrap customizada
    (function() {
        'use strict'
        const form = document.getElementById('loginForm');

        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                // Simulação de envio — substitua por fetch()/XMLHttpRequest quando integrar com backend
                //alert('Formulário válido — aqui você faria a requisição ao servidor.');
            }
            form.classList.add('was-validated');
        }, false);
    })();

    // Toggle mostrar/ocultar senha
    (function() {
        const pwd = document.getElementById('inputPassword');
        const btn = document.getElementById('togglePassword');
        const icon = document.getElementById('togglePasswordIcon');

        btn.addEventListener('click', function() {
            const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
            pwd.setAttribute('type', type);
            // alterna ícone
            if (type === 'text') {
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
                btn.setAttribute('aria-pressed', 'true');
                btn.setAttribute('aria-label', 'Ocultar senha');
            } else {
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
                btn.setAttribute('aria-pressed', 'false');
                btn.setAttribute('aria-label', 'Mostrar senha');
            }
        });
    })();
    </script>
</body>

</html>