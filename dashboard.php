<?php
  require_once __DIR__ . "/Models/Department.php";
  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_SESSION["username"])) {
    $departments = Department::all();
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
    
    <title>Dashboard page</title>
  </head>
  
  <body>
    
    <header id="app_header">
      <nav class="navbar navbar-expand navbar-dark bg-dark">
          <div class="nav navbar-nav d-flex justify-content-between w-100 px-4">
              <a class="nav-item nav-link active px-0" href="index.php" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
              <?php if ($_SESSION["username"]) : ?>
                      <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-primary">Log out</button>
                      </form>
              <?php endif; ?>
          </div>
      </nav>
      
    </header>
    <!-- /#app_header -->

    <main id="app_main">
      <div class="banner p-4 bg-light d-flex justify-content-between align-items-center">
        <h5 class="display-6 mb-0">Dashboard</h5>
        <?php if($_SESSION["username"]) : ?>
        <h4 class="mb-0">Hi, <?= $_SESSION["username"]; ?>!</h4>
        <?php endif; ?>
      </div>

      <div class="container-fluid my-4 px-4">
        <?php if(isset($departments)) : ?>
        <div class="table-responsive">
          <table class="table table-primary">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Website</th>
                <th scope="col">Head of Department</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($departments as $department) : ?>
              <tr class="">
                <td scope="row"><?= $department["name"]; ?></td>
                <td scope="row"><?= $department["website"]; ?></td>
                <td scope="row"><?= $department["head_of_department"]; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php endif; ?>
      </div>
    </main>
    <!-- /#app_main -->
    
  </body>
  
</html>
