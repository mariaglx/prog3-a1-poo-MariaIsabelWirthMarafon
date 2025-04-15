<?php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

// Inicia a sessão
Sessao::iniciar();

// Pega os dados do formulário com segurança
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'] ?? '';

// Validação básica
if (!$nome || !$email || empty($senha)) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Erro no Cadastro</title>
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                background-color: #fff3e0;
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
                color: #e65100;
            }

            a {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #ef6c00;
                color: white;
                text-decoration: none;
                border-radius: 8px;
            }

            a:hover {
                background-color: #e65100;
            }
        </style>
    </head>
    <body>
        <div class="erro-box">
            <h2>Cadastro inválido 😬</h2>
            <p>Por favor, preencha todos os campos corretamente.</p>
            <a href="cadastro.php">Tentar novamente</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Registra o usuário
$usuario = Autenticador::registrarUsuario($nome, $email, $senha);

// Guarda o nome do usuário na sessão
Sessao::set('usuario_nome', $usuario->getNome());

// Redireciona para a área logada
header('Location: dashboard.php');
exit;
