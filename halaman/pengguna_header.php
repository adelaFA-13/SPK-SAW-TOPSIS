
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Index KetanahSuci</title>
    <link
      rel="stylesheet"
      href="Asset3/libraries/bootstrap/css/bootstrap.css"
    />
    <link rel="stylesheet" href="Asset3/styles/main.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->
    <!-- Bootstrap navbar example -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <div class="container">
      <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">
          <img src="Asset3/images/icon1.png" alt="" /> KetanahSuci
        </a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navb"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navb">
          <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item mx-md-2">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item mx-md-2">
              <a class="nav-link" href="#">Agent Travel</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
               
                id="navbardrop"
                data-toggle="dropdown"
              >
                Paket Travel
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Paket Haji</a>
                <a class="dropdown-item" href="#">Paket Umrah</a>
              </div>
            </li>
            <li class="nav-item mx-md-2">
              <a class="nav-link" href="#">Testimonial</a>
            </li>
          </ul>

          <!-- Mobile button -->
          <form action="../login.php" method="Post" class="form-inline d-sm-block d-md-none">
            <button type="submit" class="btn btn-login my-2 my-sm-0">
              Masuk
            </button>
          </form>
          <!-- Desktop Button -->
          <form action = "login.php" class="form-inline my-2 my-lg-0 d-none d-md-block">
            <button type="submit" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
              Masuk
            </button>
          </form>
        </div>
      </nav>
    </div>