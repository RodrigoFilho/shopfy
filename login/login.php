<?php
include('Conexao.php');
if(isset($_POST['email']) && isset($_POST['senha'])){
    header('location: index.html');
    exit();
} else{
    $email  = mysqli_real_escape_string($Conexao, $_POST['email']);
    $senha  = mysqli_real_escape_string($Conexao, $_POST['senha']);

    $sql_command->executeSelect ("select funcionario where email = '{$email}' and senha '{$senha}'");
    $sql_result = mysqli_query($Conexao, $sql_command);
    $linha->rowCount() > 0;
    echo $linha, exit();
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
            <input type="submit" value="ENTRAR" class="button">
        </form>
    </div>
</body>

</html>