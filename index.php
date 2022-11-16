<?php
use DatabaseCon\DB_tables;
session_start(["name" => "Session"]);
require_once(dirname(__FILE__)."\src\php\imports.php");
$__isSessionSet = (isset($_SESSION["id"]) and gettype($_SESSION["id"]) === "integer") ? true : false;


$__exitSession = (isset($_POST["sair"]) and $_POST["sair"] === "true");

if ($__exitSession) {
  $_SESSION = array();
  $__isSessionSet = false;
}

$elements = DB_tables::getFiles(db);
$qtdElement = count(DB_tables::getFiles(db));
$i = 0;
$rngElements = generateNumber($elements);

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./src/css/style.css">
    <link href="./src/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>GreenMed</title>
</head>
<body>
  <div class="modal fade" id="subModal" tabindex="-1" aria-labelledby="subModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="subModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="" alt="" class="rounded img-fluid" id="subModalImg">
          <div class="accordion accordion-flush" id="accordionFlush">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Descrição
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                <div class="accordion-body">
                  <div><b>Descrição Curta:</b> <p id="subModalDesc"></p></div>
                  <div><b>Descrição Completa:</b> <p id="subModalFullDesc"></p></div>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion accordion-flush" id="accordionFlush_">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  Dados
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush_">
                <div class="accordion-body">
                  <div><b>Nome Da Planta:</b> <p id="subModalName"></p></div>
                  <div><b>Nome Cientifico Da Planta:</b> <p id="subModalSurName"></p></div>
                  <div><b>Região:</b> <p id="subModalLocal"></p></div>
                </div>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="mainModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="./src/php/pages/formpost.php" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="mainModalLabel">Criar Post</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="form-floating mb-3">
                <input type="text" name="nomePL" id="formControlInpt" class="form-control" placeholder="Nome da planta (EX. Aloe Vera)" required>
                <label for="formControlInpt">Nome Da Planta</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nomeCientifico" id="formControlSurInpt" class="form-control" placeholder="Nome da planta (EX. Aloe Vera)" required>
                <label for="formControlSurInpt">Nome Cientifico</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="shortDesc" id="shortDescInpt" placeholder="Descrição Curta" class="form-control" required>
                <label for="shortDescInpt">Descrição Curta</label>
              </div>
              <div class="mb-3">
                <label for="message-text" >Descrição Completa</label>
                <textarea class="form-control" id="message-text" name="fullDesc" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="form-floating mb-3">
                <select name="regiao" id="formControlSelect" class="form-select" required>
                  <option selected></option>
                  <option value="1">Norte</option>
                  <option value="2">Nordeste</option>
                  <option value="3">Sul</option>
                  <option value="4">Sudeste</option>
                  <option value="5">Centro-Oeste</option>
                </select>
                <label for="formControlSelect">Região</label>
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3">
                <label for="formControlFile">Imagem</label>
                <input type="file" class="form-control" name="file" id="formControlFile" aria-label="Upload" required>
                <small>- Tamanho Máximo do arquivo: 4.0Mb </small>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <input type="submit" class="btn btn-primary" value="Enviar" name="submit"></input>
          </div>
        </div>
    </form>
  </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#" id="nav_text">GreenMed</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <a class="nav-link" id="nav_text_" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav_text_" href="#sobreInfo">Sobre</a>
              </li>
              <li class="nav-item">
                <div id="user-li">
                  <a href="#" class="nav-link user d-inline-block" id="<?php echo $__isSessionSet  ? "user_" : "user"; ?>">
                    <i class="bi bi-person-circle"></i>
                  </a>
                </div>
              </li>
              <li class="nav-item" style=" display: <?php echo $__isSessionSet  ? "flex" : "none"; ?>">
                <div class="con-user">
                  <a href="#" aria-describedby="Criar Post"  rel="noopener noreferrer" class="nav-link" id="create-post" data-bs-toggle="modal" data-bs-target="#mainModal">
                    <i class="bi bi-plus-circle"></i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
          <div class="form-popup" id="mainForm">
            <form action="src/php/pages/formlog.php" method="POST" class="form-container" id="main-form">
              <h1>Login</h1>

              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Insira o Email" name="email_" id="mailInpt" required>
          
              <label for="psw"><b>Senha</b></label>
              <input type="password" placeholder="Insira a Senha" name="senha" id="passInpt" required>
              <p id="warning-text" style="display: none;">CapsLock Ativado!</p>
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
              <input type="text" name="usuario" placeholder="Insira seu nome" id="userInpt" required="required">
          
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Insira o Email" name="email" id="subMailInpt" required>
          
              <label for="psw"><b>Senha</b></label>
              <input type="password" placeholder="Insira a Senha" name="senha" id="subPassInpt" required>
          
              <p id="warning-text-" style="display: none;">CapsLock Ativado!</p>
              <button type="submit" class="btnf-sub">Registro</button>
              <button type="button" class="btnf-sub cancel hvr-icon-rotate" id="closeF-sub">Fechar <i class="fa-solid fa-xmark hvr-icon"></i>
              </button>
            </form>
          </div>
          <div class="user-container" id="userConfig">
            <div class="user-popup">
                <h5 id="userName">Olá! <?php echo $__isSessionSet ? $_SESSION["user"] : 'default' ?></h5>
                <form action="" method="post">
                  <div class="configurarConta">
                    <button type="submit">
                      <p>Configurações</p>
                      <i class="fas fa-solid fa-gear"></i>
                    </button>
                  </div>
                </form>
                <form action="index.php" method="post">
                  <div class="sairConta" id="sair-conta">
                    <button type="submit" name="sair" value="true">
                      <p>Encerrar Sessão</p>
                      <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </button>
                  </div>
                </form>
            </div>
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
            <div class="carousel-item active" style=" background-image: url('./src/php/pages/<?php echo $elements[$rngElements[0]]["caminho"] ?? 'defaults/default-bg.jpg'; ?>')">
              <div class="carousel-caption">
                <h5><?php echo $elements[$rngElements[0]]["nomePl"] ?? ''; ?></h5>
                <p id="short_desc"><?php echo $elements[$rngElements[0]]["shortDesc"] ?? ''; ?></p>
              </div>
            </div>
            <div class="carousel-item" style=" background-image: url('./src/php/pages/<?php echo $elements[$rngElements[1]]["caminho"] ?? 'defaults/default-bg.jpg'; ?>')">
              <div class="carousel-caption">
                <h5><?php echo $elements[$rngElements[1]]["nomePl"] ?? ''; ?></h5>
                <p id="short_desc"><?php echo $elements[$rngElements[1]]["shortDesc"] ?? ''; ?></p>
              </div>
            </div>
            <div class="carousel-item" style=" background-image: url('./src/php/pages/<?php echo $elements[$rngElements[2]]["caminho"] ?? 'defaults/default-bg.jpg'; ?>')">
              <div class="carousel-caption">
                <h5><?php echo $elements[$rngElements[2]]["nomePl"] ?? ''; ?></h5>
                <p id="short_desc"><?php echo $elements[$rngElements[2]]["shortDesc"] ?? ''; ?></p>
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
        <?php while($i !== $qtdElement):  ?>
          <div class="card" id="card_<?=$i?>" style="width: 18rem; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#subModal">
              <img src="./src/php/pages/<?=$elements[$i]['caminho']?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?=$elements[$i]['nomePl']?></h5>
                <p class="card-text"><?=$elements[$i]['shortDesc']?></p>
              </div>
            </div>
          <?php $i++; ?>
        <?php endwhile; ?>
      </div>

    <footer class="w-100 py-4 flex-shrink-0" id="sobreInfo">
      <div id="shadow"><div id="grad_anim"></div></div>
      <div class="container-fluid py-4">
        <div class="row gy-4 gx-5">
          <div class="col-lg-4 col-md-6">
            <h5 class="h1 text-white">FB.</h5>
            <p class="small text-muted">Lorem Ipsum</p>
            <p class="small text-muted mb-0">&copy; LGPL-3.0 Licensed <a href="https://github.com/Opylx" class="text-primary"><br>Created BY Emanuel Nogueira (Aka: DigamaSyx)</a></p>
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
                  <i class="bi bi-envelope-paper"></i>
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