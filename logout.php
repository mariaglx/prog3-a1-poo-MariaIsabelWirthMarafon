<?php
// Inicia a sessão e carrega a classe
include_once 'classes/Sessao.php';

Sessao::iniciar();
Sessao::destruir();
setcookie('email', '', time() - 3600);  // Remover o cookie
header("Location: login.php");
exit;
