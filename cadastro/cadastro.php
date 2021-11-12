<?php
header("Content-type:text/html; charset=utf8");
require_once "Conexao.php";
$Conexao = new Conexao();

if(isset($_POST["cadastrar"])){

    $result = $Conexao->inserir();

    if($result != 0){
        header('location: ../index.php');
    }
}
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<html>

<head>
  <title>Cadastro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="cadastro_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script src="https://kit.fontawesome.com/17c7aef599.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">


  <div class="login-page">
    <div class="form">

      <form>
        <div class="user_image">
          <img src="img/Design sem nome.png" alt="">
        </div>
        <input type="text" id="usuario" placeholder="&#xf0e0;  E-mail" />
        <input type="text" id="usuario" placeholder="&#xf007;  Usuário" />
        <input type="password" id="senha" placeholder="&#xf023;  Senha" />
        <br>
        <br>
        <button name="cadastrar">CADASTRAR</button>
      </form>
    </div>
</body>

</html>