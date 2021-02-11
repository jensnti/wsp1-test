<?php

class BlogController {

  public static function create($request)
  {

    $sql = "INSERT INTO posts (user_id, body) VALUES (? , ?)";

    $dbh = new DB();
    $dbh->query($sql, $request);

    var_dump($_SERVER['PHP_SELF']);

    // header($_SERVER['PHP_SELF']);

  }


}