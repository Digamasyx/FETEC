<?php 
require_once("./src/php/db/database.php")


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link href="./src/bootstrap/bootstrap.css" rel="stylesheet">
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
            </ul>
          </div>
        </div>
      </nav>

      <header>

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
    <script src="https://kit.fontawesome.com/996440bfa8.js" crossorigin="anonymous"></script>
    <script src="./src/bootstrap/bootstrap.bundle.js"></script>
    <script src="./src/js/index.js" type="module"></script>
</html>