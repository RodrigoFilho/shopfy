<?php
header("Content-type:text/html; charset=utf8");
//importa a classe conexão
require_once "Conexao.php";
//criar uma instância da classe conexão login
$Conexao = new Conexao();
//botao login
if(isset($_POST["entrar"])){
    $result = $Conexao->login();
    //testar se login deu certo
    if ($result != 0){
        //login correto / enviar para tela inicial do sistema
        header('location:../index.html');
    }else{
        //login incorreto / dar a mensagem de erro para o usuário
        echo "<script>alert('Login ou senha incorretos.'</script>)";
    }
}

?>

<!DOCTYPE HTML>
<html lang="pt-BR">
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <script src="https://kit.fontawesome.com/17c7aef599.js" crossorigin="anonymous"></script>
</head>

<body class="body">
<div class="login-page">
    <div class="form">
        <form action="" method="post">
            <div class="user_image">
                <img src="user_icon.png" alt="">
            </div>
            <!--<div class="error__message" id="error-message">
            <p class="text_message"><i class="fas fa-info"></i>  Usuário ou senha incorretos</p>
            </div> -->
            <input type="email" id="email" name="email" placeholder="&#xf007;  E-mail"/>
            <input type="password" id="senha" name="senha" placeholder="&#xf023;  Senha"/>
            <br>
            <br>
            <input type="submit" value="ENTRAR" name="entrar" class="button">
        </form>
    </div>
</body>

</html>