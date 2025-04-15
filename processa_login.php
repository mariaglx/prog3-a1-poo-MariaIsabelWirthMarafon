<?php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

// Pega os dados do formulário
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'] ?? '';
$lembrar = isset($_POST['lembrar_email']);

// Validação básica
if (!$email || empty($senha)) {
    echo "E-mail ou senha inválidos. <a href='login.php'>Tentar novamente</a>";
    exit;
}

// Autentica o usuário
$usuario = Autenticador::autenticar($email, $senha);

if ($usuario) {
    Sessao::set('usuario_nome', $usuario->getNome());

    // Se checkbox foi marcado, cria cookie com validade de 30 dias
    if ($lembrar) {
        setcookie('lembrar_email', $email, time() + (30 * 24 * 60 * 60));
    } else {
        setcookie('lembrar_email', '', time() - 3600); // apaga cookie
    }

    header('Location: dashboard.php');
    exit;
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Erro no Login</title>
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                background-color: #ffebee;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }

            .erro-box {
                background-color: #fff;
                padding: 30px 40px;
                border-radius: 12px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                text-align: center;
                color: #b71c1c;
            }

            a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #d32f2f;
                color: white;
                text-decoration: none;
                border-radius: 8px;
            }

            a:hover {
                background-color: #c62828;
            }
        </style>
    </head>
    <body>
        <div class="erro-box">
            <h2>Login falhou 😥</h2>
            <p>Verifique seu e-mail e senha e tente novamente.</p>
            <a href="login.php">Voltar ao login</a>
        </div>
    </body>
    </html>
    <?php
}

