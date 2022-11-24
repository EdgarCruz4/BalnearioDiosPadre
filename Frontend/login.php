<!doctype html>
<html lang="en">
  <head>
    <!-- requiredd meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/login.css">
    <!-- Favicons -->
    <link href="img/dios-padre.webp" rel="icon">
    <title>Sign in</title>
  </head> 
  <body>
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
              <div align="center">
                    <img src="img/dios-padre.webp" width="150px">
                  </div>
                  <div class="mb-5 mt-2" align="center">
                    <h3><span>Inicia sesión</span></h3>
                    <label class="form-check-label">Sistema de administración de herramientas y préstamos</label>
                  </div>
                  <form action="../backend/login.php" method="post" id="formularioDts">
                    <div class="form-group first">
                      <label for="correo">Correo</label>
                      <input type="email" class="form-control" name="correo" required>
                    </div>
                    <br>
                    <div class="form-group last">
                      <label for="password">Contraseña</label>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-check mt-3 mb-3">
                      <input class="form-check-input" type="checkbox" value="" name="" required/>
                      <label class="form-check-label" for="form2Example31"><a href="terminosUso.html" style="text-decoration:none" target="_blank"> Acepto terminos de uso y condiciones</a></label>
                    </div>
                    <div>
                      <button class="button" type="submit" >Iniciar sesión</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="../backend/js/jquery-3.3.1.min.js"></script>
    <script src="../backend/js/popper.min.js"></script>
    <script src="../backend/js/bootstrap.min.js"></script>
    <script src="../backend/js/login.js"></script>
  </body>
</html>