<?php
  // require_once __DIR__ . "/Helpers/DB.php";
  require_once __DIR__ . "/Models/User.php";

  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_POST["username"]) && isset($_POST["password"]) && $_POST["username"] != "" && $_POST["password"] != "") {
    // var_dump("Check user credentials");
    
    $result = User::find($_POST["username"], $_POST["password"]);

    if($result && $result -> num_rows) {
      $_SESSION["authenticated"] = true;
      $user = $result -> fetch_assoc();
      // var_dump($user);
      $_SESSION["userId"] = $user["id"];
      $_SESSION["username"] = $user["username"];
      // var_dump(__DIR__);
      header('Location: dashboard.php');
    } elseif($result) {
      // echo "No results";
      $_SESSION["errors"] = null;
      $_SESSION["authenticated"] = false;
      header('Location: index.php');
    } else {
      echo "Query error";
    }
  } else {
    // echo "Missing validation";
    $_SESSION["authenticated"] = null;
    $_SESSION["errors"] = "All fields must be filled";
    header('Location: index.php');
  }
  session_write_close();
