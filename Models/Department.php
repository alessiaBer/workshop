<?php
  require_once __DIR__ . "/../Helpers/DB.php";

  class Department {
    public static function all() {
      $connection = DB::connect();
      $sql = "SELECT * FROM `departments`";
      $results = $connection -> query($sql);
      DB::disconnect($connection);
      return $results -> fetch_all(MYSQLI_ASSOC);
    }
  }
