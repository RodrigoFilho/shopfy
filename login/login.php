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
<?php
include('Conexao.php');

//previnir mysqli
$mysqli = new mysqli("localhost","root","","supermercado_bd");

if (isset($_POST['email']) || isset($_POST['senha'])){
    if (!empty($_POST['email'])) {
        echo "Favor inserir seu email";
    }elseif (!empty($_POST['senha'])){
        echo "Favor inserir sua senha";
    }
} else{

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql = "select from funcionario where 'senha' = $senha and email = $email";
    $sql_query = $mysqli->query($sql) or die("Falha na exucução do código SQL");

    $linhas = $sql_query->num_rows;
    if ($linhas == 1){
        $email = $sql_query->fetch_assoc();

        if (!isset($_SESSION)){
            session_start();
        }
        $_SESSION['email'] = $email['email'];

        header("Location: ../index.html");

    }else{
        echo "Email ou senha incorretos!";
        return;
    }
}

?>
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
            <input type="submit" value="ENTRAR" class="button">
        </form>
    </div>
</body>

</html>