<?php

require_once 'Usuario.php';

class Autenticador {
    // Usando uma variável estática para armazenar os usuários em memória
    private static $usuarios = [];

    public static function registrarUsuario($nome, $email, $senha) {
        // Criando o usuário e adicionando à lista estática
        $usuario = new Usuario($nome, $email, $senha);
        self::$usuarios[] = $usuario;
        return $usuario;
    }

    public static function autenticar($email, $senha) {
        // Procurando pelo usuário e verificando a senha
        foreach (self::$usuarios as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->verificarSenha($senha)) {
                return $usuario;
            }
        }
        return null;
    }

    public static function getUsuarios() {
        // Retorna todos os usuários (para debug ou visualização)
        return self::$usuarios;
    }
}
