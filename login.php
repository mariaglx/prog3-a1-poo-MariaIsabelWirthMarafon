<?php
$emailSalvo = $_COOKIE['lembrar_email'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e3f2fd;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 20px;
            color: #0d47a1;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .checkbox input {
            margin-right: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #1976d2;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #1565c0;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #1976d2;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="processa_login.php" method="post">
            <label>E-mail:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($emailSalvo); ?>" required>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <div class="checkbox">
                <input type="checkbox" name="lembrar_email" value="1">
                <label>Lembrar meu e-mail</label>
            </div>

            <button type="submit">Entrar</button>
        </form>
        <a href="cadastro.php">Ainda não tem conta? Cadastre-se</a>
    </div>
</body>
</html>
