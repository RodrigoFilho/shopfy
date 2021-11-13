<?php
header("Content-type:text/html; charset=utf8");
//importar a classe alunos

require_once "../classes/produtosClasse.php";
//criar instacia da classe
$Produtos = new Produtos();
//criar uma variavel para receber o selecet
$ListaProdutos = $Produtos->ListarTodos();
//var_dump($ListaProdutos); die(); //testar conteudo da variável(pra usar, tirar comentário)
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/17c7aef599.js" crossorigin="anonymous"></script>
  <!--Bootstrap-->
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--Fonte-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family-Poppins:wght@400;500;600&display-swap" rel="stylesheet">
  <!-- carrinho script -->
  <script src="/assets/js/store.js" async></script>
  <!-- btn-mobile -->
  <script src="/assets/js/btn-mobile.js" async></script>
  <!--Icone-->
  <link rel="shortcut icon" href="assets/img/favico.ico" type="image/x-icon">
  <!--Título-->
  <title>Top 10 loja foda</title>
</head>

<body>

  <!-- navbar -->
  <header id="header__nav">
    <img src="../assets/img/favico.ico" alt="" class="img__nav" href="#">
    <nav id="navbar">
    <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <ul id="menu">
        <li><a href="../index.php" style="color: white; text-decoration: none;"> Produtos</a></li>
        <li>Lojas</li>
        <li><a href="../index.php" style="color: white; text-decoration: none;">Ofertas</a></li>
        <li><a href="#categoria" style="color: white; text-decoration: none;">Promoções</a></li>
        <li>Contato</li>
      </ul>
    </nav>
    <div class="btn-form">
      <button class="btn__form" href="" onClick="abrirCadastro()"><i class="fas fa-user"></i> Cadastrar</button>
      <button class="btn__form"> <a href="../login/login.php" style="color: white; text-decoration: none;"><i class="fas fa-sign-in-alt"></i> Entrar</a></button>
    </div>
  </header>
  <div class="categoria__nav">
    <ul class="categoria__menu">
      <li>|</li>
      <li><a href="#categoria" style="color: white; text-decoration: none;">Bebidas</a></li>
      <li>|</li>
      <li>Doces</li>
      <li>|</li>
      <li>Vinhos</li>
      <li>|</li>
      <li>Carnes</li>
      <li>|</li>
      <li>Limpesa</li>
      <li>|</li>
    </ul>
  </div>
  <div class="titulo__promo">
    <p>AS MELHORES PROMOÇÕES VOCÊ SÓ ENCONTRA AQUI!</p>
  </div>

  <!-- serviços -->
  <section class="section services">
    <div class="service-center container">
      <div class="service">
        <span class="icon"><i class="fas fa-shopping-basket" style="font-size: 45px;"></i></span>
        <h4>Entrega Grátis</h4>
        <span class="text">Em pedidos acima de R$39</span>
      </div>

      <div class="service">
        <span class="icon"><i class="fab fa-cc-apple-pay"></i></i></span>
        <h4>Pagamento Seguro</h4>
        <span class="text">Parcelamento de até 12X</span>
      </div>

      <div class="service">
        <span class="icon"><i class="fas fa-clock"></i></span>
        <h4>Suporte 24 Horas</h4>
        <span class="text">Estamos a disposição</span>
      </div>
    </div>
  </section>

  <!--Dropdown-->
  <div class="titulo__filtro" style="font: bold 2em 'Poppins', sans-serif;">
    <div class="container__filtro">
      <div class="dropdown dropright">
        <p>Filtre pela categoria do produto:</p>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          Selecione
        </button>
        <div class="dropdown-menu" style="font: bold 'Poppins', sans-serif;">
          <a class="dropdown-item" href="#categoria">Bebidas</a>
          <a class="dropdown-item" href="#">Doces</a>
          <a class="dropdown-item" href="#">Diversos</a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!--Card dos produtos-->
  <section class="container1 content-section">
  <?php
    if($ListaProdutos != 0) { ?>
    <?php foreach($ListaProdutos as $Obj){?>
 

    <div class="shop-items">
      <div class="<?php echo $Obj->categoria ?>">
        <div class="shop-item">
          <span class="shop-item-title"><?php echo $Obj->nome ?></span>
          <img class="shop-item-image" src="<?php echo $Obj->foto ?>">
          <div class="shop-item-details">
            <span class="shop-item-price">R$<?php echo $Obj->preco ?></span>
            <button class="shop-item-button" type="button">Comprar</button>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>
  <?php }else{ ?>
  <?php echo "<h1>Não nenhum produto foi encontrado!</h1>" ?>
  <?php } ?>
     </section>

  <!-- carrinho -->
  <section class="container content-section2">
    <h2 class="section-header">CARRINHO</h2>
    <div class="cart-row">
      <span class="cart-item cart-header cart-column">ITENS</span>
      <span class="cart-price cart-header cart-column">PREÇO</span>
      <span class="cart-quantity cart-header cart-column">QUANTIDADE</span>
    </div>
    <div class="cart-items">
    </div>
    <div class="cart-total">
      <strong class="cart-total-title">Total</strong>
      <span class="cart-total-price">R$0.00</span>
    </div>
    <button class="btn btn-primary btn-purchase" type="button">COMPRAR</button>
  </section>

  <!-- rodapé -->
  <footer class="footer">
    <div class="footer__pessoas">
      <li class="titulo__footer__pessoas">Os mais pesados do cotemig</li>
      <br>
      <li>Rodrigo Filho</li>
      <li>Felipe Lauria</li>
      <li>Alex Monster</li>
      <li>Lucas nn sei oq</li>
      <div class="footer__icons">
        <div class="footer__icons__instagram">
          <i class="fab fa-instagram" title="Instagram"></i>
        </div>
        <div class="footer__icons__facebook">
          <i class="fab fa-facebook" title="Facebook"></i>
        </div>
        <div class="footer__icons__git-hub">
          <i class="fab fa-github-alt" title="Git Hub"></i>
        </div>
      </div>
    </div>
    <div class="footer__fontes">
      <li class="titulo__footer__fontes">Elogio ou reclamação</li>
      <br>
      <form action="" method="post" class="contato">
        <div class="footer__subscribe">
          <input type="email" placeholder="Qual é seu e-mail?" class="footer__input" name="email">

          <button class="footer__button">
            Enviar
            <i class="fas fa-arrow-right"></i>
          </button>
        </div>
      </form>
    </div>
    <span class="titulo__copirait">&#169; ó, nois q fez o site e vc nn tem autorização nenhuma pra pegar nada
      daqui😡</span>
  </footer>

  <!--Script rolagem da tela-->
  <script src="assets/js/rolagem.js"></script>
  <!--Script abrir página-->
  <script src="assets/js/abrir_pagina.js"></script>
</body>

</html>