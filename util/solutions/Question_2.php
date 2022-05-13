<?php

include_once 'IQuestion.php';

class Question_2 implements IQuestion
{
  public static function solve()
  {
    // DB Options.
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'gale_healthcare_db';

    // Connect to the server and database.
    $connection = mysqli_connect($host, $username, $password, $database);

    $query1 = "SELECT u.userid, u.username, u.email, group_concat(ph.password SEPARATOR ',') passwords FROM user u JOIN passwordhistory ph ON ph.userid = u.userid GROUP BY ph.userid;";

    $result1 = mysqli_query($connection, $query1);
    if ($result1) {
      $jsonResult1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
      echo json_encode($jsonResult1);
    } else {
      echo 'Error querying the database';
    }
  }
}
