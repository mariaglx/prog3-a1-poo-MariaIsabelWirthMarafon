<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();

$nome = Sessao::get('usuario_nome');

if (!$nome) {
    header('Location: login.php');
    exit;
}

$emailSalvo = $_COOKIE['lembrar_email'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Usuário</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e8f5e9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #2e7d32;
        }

        p {
            margin: 10px 0;
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #c62828;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        a:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bem-vindo(a), <?php echo htmlspecialchars($nome); ?>!✨</h2>

        <?php if ($emailSalvo): ?>
            <p>Seu e-mail salvo: <strong><?php echo htmlspecialchars($emailSalvo); ?></strong></p>
        <?php else: ?>
            <p>Você não salvou o e-mail no login.</p>
        <?php endif; ?>

        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
