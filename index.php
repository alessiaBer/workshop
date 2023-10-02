<?php
  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
  }

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- EXTERNAL FONTAWESOME CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- EXTERNAL BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Login page</title>
  </head>
  
  <body>
    
    <header id="app_header">
      <nav class="navbar navbar-expand navbar-dark bg-dark px-4">
          <div class="nav navbar-nav">
              <a class="nav-item nav-link active px-0" href="index.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
          </div>
      </nav>
      
    </header>
    <!-- /#app_header -->

    <main id="app_main">
      <div class="banner p-4 bg-light">
        <h5 class="display-6 mb-0">Login page</h5>
      </div>

      <div class="login_form my-5">
        <div class="container d-flex justify-content-center">
          <div class="col-6">
            <div class="card rounded-0 border-0 shadow">
              <div class="card-body">
                <form action="login.php" method="post">

                  <?php if(isset($_SESSION["errors"])) : ?>
                  <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> All fields must be filled.
                  </div>
                  <?php endif; ?>

                  <?php if(isset($_SESSION["authenticated"]) && !$_SESSION["authenticated"]) : ?>
                    <div class="alert alert-danger" role="alert">
                      <strong>Alert:</strong> No user found.
                    </div>
                  <?php endif; ?>
                  
                  <div class="mb-3">
                    <label for="username" class="form-label">
                      <i class="fa-solid fa-user-ninja fa-xs fa-fw"></i>
                      Username
                    </label>
                    <input type="text"
                      class="form-control" name="username" id="username" aria-describedby="usernameHelper" placeholder="Your name here">
                    <small id="usernameHelper" class="form-text text-muted">Type here your username</small>
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">
                      <i class="fa-solid fa-lock fa-xs fa-fw"></i>
                      Password
                    </label>
                    <input type="password"
                      class="form-control" name="password" id="password" aria-describedby="passwordHelper" placeholder="Your password here">
                    <small id="passwordHelper" class="form-text text-muted">Type here your password</small>
                  </div>

                  <button type="submit" class="btn btn-dark">Log in</button>
                  <button type="reset" class="btn btn-danger ms-2">Reset</button>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
