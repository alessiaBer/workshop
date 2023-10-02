<?php
  require_once __DIR__ . "/../Helpers/DB.php";

  class User {
    public static function find($username, $password) {
      $md5Password = md5($password);

      $connection = DB::connect();
      // var_dump($connection);
    
      $sql = "SELECT `id`, `username` FROM `users` WHERE `username` = ? AND `password` = ?";

      $statement = $connection -> prepare($sql);
      $statement -> bind_param("ss", $username, $md5Password);

      $statement -> execute();
      // var_dump($statement);
      $result = $statement->get_result();
      if($result) {
        // var_dump($result);
        return $result;
      }
      DB::disconnect($connection);
      return false;
    }
  }
