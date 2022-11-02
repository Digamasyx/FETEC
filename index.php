<?php
if (isset($_SESSION["logged"]) and $_SESSION["logged"] == true) {
  unset($_SESSION["logged"]);
}
if (!isset($_SESSION)) {
  $_SESSION["logged"] = false;
}
session_start();
var_dump($_SESSION);

require_once(dirname(__FILE__)."\src\php\imports.php");
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link href="./src/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/fontawesome/css/all.css">
    <script src="./src/fontawesome/js/all.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#" id="nav_text">Lorem</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link" id="nav_text_" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav_text_" href="#">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav_text_" href="#">Social</a>
              </li>
              <li class="nav-item">
                <div id="user-li">
                  <a href="#" class="nav-link" id="user">
                    <i class="fas fa-solid fa-user" id="user-icon"></i>
                  </a>
                </div>
              </li>
              <li class="nav-item" style=" display: <?php echo (isset($_SESSION["logged"]) and $_SESSION["logged"] == true) ? "flex" : "none"; ?>">
                <div class="con-user">
                  <a href="#" aria-describedby="Criar Post"  rel="noopener noreferrer" class="nav-link" id="create-form">
                    <i class="fas fa-solid fa-plus"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
          <div class="form-popup" id="mainForm">
            <form action="src/php/pages/formlog.php" method="POST" class="form-container">
              <h1>Login</h1>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Insira o Email" name="email_" required>
          
              <label for="psw"><b>Senha</b></label>
              <input type="password" placeholder="Insira a Senha" name="senha" required>
          
              <a id="reg-main" class="reg-main">Não possui conta? Registre-se</a>
              <button type="submit" class="btnf">Login</button>
              <button type="button" class="btnf cancel hvr-icon-rotate" id="closeF">Fechar <i class="fa-solid fa-xmark hvr-icon"></i>
              </button>
            </form>
          </div>
          <div class="form-popup-sub" id="subForm">
            <form action="src/php/pages/formreg.php" method="POST" class="form-container-sub" name="login">
              <h1>Registro</h1>

              <label for="usuario"><b>Usuario</b></label>
              <input type="text" name="usuario" placeholder="Insira seu nome" required="required">
          
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Insira o Email" name="email" required>
          
              <label for="psw"><b>Senha</b></label>
              <input type="password" placeholder="Insira a Senha" name="senha" required>
          
              <button type="submit" class="btnf-sub">Registro</button>
              <button type="button" class="btnf-sub cancel hvr-icon-rotate" id="closeF-sub">Fechar <i class="fa-solid fa-xmark hvr-icon"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>

      <header id="head_">
        <div id="carousel_" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel_" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel_" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel_" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="carousel-caption">
                <h5>Lorem</h5>
                <p id="short_desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ullam explicabo quae illo reiciendis, in amet labore magni quaerat, incidunt itaque, dolore sed? Veniam corporis laudantium provident, similique ipsum voluptas.</p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-caption">
                <h5>Lorem</h5>
                <p id="short_desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius libero cupiditate cumque quasi et sunt repudiandae a nobis corporis explicabo tempore placeat magnam sapiente, quibusdam mollitia molestiae ipsa distinctio nesciunt.</p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-caption">
                <h5>Lorem</h5>
                <p id="short_desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt accusantium, nulla quibusdam iure, voluptas quae facilis sunt eum exercitationem saepe vero? Magni voluptatum neque assumenda, debitis aliquam tempore. Ut, unde.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carousel_" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carousel_" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </header>
      
      <div id="catalog_body">
        <div id="card_1" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
        <div id="card_2" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem1</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
        <div id="card_3" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem2</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
        <div id="card_4" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem3</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
        <div id="card_5" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem4</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
        <div id="card_6" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem5</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
        <div id="card_7" class="card">
          <img src="./src/img/test-user.png" alt="Icon">
          <div class="container_">
            <h4><b>Lorem6</b></h4>
            <p id="short_desc">Lorem</p>
          </div>
        </img>
      </div>
  </div>

    <footer class="w-100 py-4 flex-shrink-0">
      <div id="shadow"><div id="grad_anim"></div></div>
      <div class="container-fluid py-4">
        <div class="row gy-4 gx-5">
          <div class="col-lg-4 col-md-6">
            <h5 class="h1 text-white">FB.</h5>
            <p class="small text-muted">Lorem Ipsum</p>
            <p class="small text-muted mb-0">&copy; MIT Licensed <a href="https://github.com/Opylx" class="text-primary"><br>Created BY Emanuel Nogueira (Aka: DigamaSyx)</a></p>
          </div>
          <div class="col-lg-2 col-md-6">
            <h5 class="text-white mb-3">Quick Links</h5>
            <ul class="list-unstyled text-muted">
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6">
            <h5 class="text-white mb-3">Quick Links</h5>
            <ul class="list-unstyled text-muted">
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
              <li><a href="#">Lorem</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5 class="text-white mb-3">Lorem</h5>
            <p class="small text-muted">Lorem</p>
            <form action="#">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's Username" aria-label="Username" aria-describedby="button-addon2">
                <button class="btn btn-primary" id="button-addon2" type="button">
                  <i class="fas fa-paper-plane"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
        
    </footer>
</body>
    <script src="./src/bootstrap/bootstrap.bundle.js"></script>
    <script src="./src/js/index.js" type="module"></script>
</html>