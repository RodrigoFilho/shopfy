<?php
define('host', 'localhost');
define('user', 'root');
define('psw', '');
define('bd', 'supermercado_bd');

$conexao = mysqli_connect(host, user, psw, bd) or die("Não foi possível conectar!");
?>