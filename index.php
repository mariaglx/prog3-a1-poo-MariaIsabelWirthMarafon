<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo(a) ao Sistema</title>
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
            text-align: center;
            background-color: white;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color:rgb(128, 77, 196);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        a:hover {
            background-color:rgb(118, 44, 214);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo(a) ao Sistema de Cadastros</h1>
        <a href="login.php">Fazer Login</a>
        <a href="cadastro.php">Cadastrar-se</a>
    </div>
</body>
</html>
