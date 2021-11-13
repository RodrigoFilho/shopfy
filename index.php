<?php
header("Content-type:text/html; charset=utf8");
//importar a classe alunos

require_once "../shopfy-1/classes/produtosClasse.php";
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
  <link rel="stylesheet" href="assets/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--Fonte-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family-Poppins:wght@400;500;600&display-swap" rel="stylesheet">
  <!-- carrinho script -->
  <script src="assets/js/store.js" async></script>
  <!--Icone-->
  <link rel="shortcut icon" href="assets/img/favico.ico" type="image/x-icon">
  <!--Título-->
  <title>SHOPFY - O shop feito para você</title>
</head>

<body>

  <!-- navbar -->
  <header id="header__nav">
    <img src="../shopfy-1/assets/img/favico.ico" alt="" class="img__nav" href="#">
    <nav id="navbar">
    <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <ul id="menu">
        <li><a href="produtos/produtos.php" style="color: white; text-decoration: none;"> Produtos</a></li>
        <li>Lojas</li>
        <li>Ofertas</li>
        <li><a href="#categoria" style="color: white; text-decoration: none;">Promoções</a></li>
        <li>Contato</li>
      </ul>
    </nav>
    <div class="btn-form">
      <button class="btn__form" href="" onClick="abrirCadastro()"><i class="fas fa-user"></i> Cadastrar</button>
      <button class="btn__form" href="" onClick="abrirLogin()"><i class="fas fa-sign-in-alt"></i> Entrar</button>
    </div>
  </header>
  <div class="categoria__nav">
    <ul class="categoria__menu">
      <li><a href="#categoria" style="color: white; text-decoration: none;">Bebidas</a></li>
      <li>Doces</li>
      <li>Vinhos</li>
      <li>Carnes</li>
      <li>Limpesa</li>
    </ul>
  </div>
  <div class="titulo__promo">
    <p>AS MELHORES PROMOÇÕES VOCÊ SÓ ENCONTRA AQUI!</p>
  </div>

  <!--Carro do céu-->
  <section id="carro-do-ceu">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/3.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

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
      <div class="dropdown dropright color-title">
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

  <section id="categoria">
    <div class="card_produtos">
      <div class="container-1">
        <div class="card-1">
          <img src="assets/img/78912908.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Coquinha gelada</h1>
              <span class="card__preci-1">$2,50</span>
              <p class="card__description-1">Nada melhor do que uma coquinha gelada né paizão?
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/55.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Carne da boa</h1>
              <span class="card__preci-1">R$500</span>
              <p class="card__description-1">A carne está cara mas teodos temos que comprar então vai esse preço mesmo.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/78911260.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Flan de caramelo</h1>
              <span class="card__preci-1">R$4,50</span>
              <p class="card__description-1">Um dos melhores flans de caramelo do mundo cara sério, confia na call do
                homem.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/img.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Nike Air Jordan</h1>
              <span class="card__preci-1">$99</span>
              <p class="card__description-1">um tênis que todos querem ter né cara é impressionante, to quase tirando do
                estoque e botando no meu guardaroupa slc.</p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card_produtos">
      <div class="container-1">
        <div class="card-1">
          <img src="assets/img/55.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Carne da boa</h1>
              <span class="card__preci-1">$500</span>
              <p class="card__description-1">A carne está cara mas teodos temos que comprar então vai esse preço mesmo.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/55.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Carne da boa</h1>
              <span class="card__preci-1">R$500</span>
              <p class="card__description-1">A carne está cara mas teodos temos que comprar então vai esse preço mesmo.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/78911260.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Flan de caramelo</h1>
              <span class="card__preci-1">R$4,50</span>
              <p class="card__description-1">Um dos melhores flans de caramelo do mundo cara sério, confia na call do
                homem.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/img.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Nike Air Jordan</h1>
              <span class="card__preci-1">$99</span>
              <p class="card__description-1">um tênis que todos querem ter né cara é impressionante, to quase tirando do
                estoque e botando no meu guardaroupa slc.</p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card_produtos">
      <div class="container-1">
        <div class="card-1">
          <img src="assets/img/55.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Carne da boa</h1>
              <span class="card__preci-1">$500</span>
              <p class="card__description-1">A carne está cara mas teodos temos que comprar então vai esse preço mesmo.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/55.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Carne da boa</h1>
              <span class="card__preci-1">R$500</span>
              <p class="card__description-1">A carne está cara mas teodos temos que comprar então vai esse preço mesmo.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/78911260.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Flan de caramelo</h1>
              <span class="card__preci-1">R$4,50</span>
              <p class="card__description-1">Um dos melhores flans de caramelo do mundo cara sério, confia na call do
                homem.
              </p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>

        <div class="card-1">
          <img src="assets/img/img.png" alt="" class="card__img-1">
          <div class="card__content-1">
            <div class="card__data-1">
              <h1 class="card__title-1">Nike Air Jordan</h1>
              <span class="card__preci-1">$99</span>
              <p class="card__description-1">um tênis que todos querem ter né cara é impressionante, to quase tirando do
                estoque e botando no meu guardaroupa slc.</p>
              <a class="card__button-1" href="/assets/produtos/produtos.html" type="button">Comprar agora </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<

  <!-- rodapé -->
  <footer class="footer">
    <div class="footer__pessoas">
      <li class="titulo__footer__pessoas">Os mais pesados do cotemig</li>
      <br>
      <li>Rodrigo Filho</li>
      <li>Felipe Lauria</li>
      <li>Alex Koester</li>
      <li>Lucas nn sei oq</li>
      <li>Matheus Gama</li>
      <li>Robson Ta, deu</li>
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