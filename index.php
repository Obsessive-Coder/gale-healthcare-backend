<?php

// DB Options.
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gale_healthcare_db';

// Connect to the server and database.
$connection = mysqli_connect($host, $username, $password, $database);

$recText = $_POST['text'];
$query = "INSERT INTO user(username) VALUES('$recText')";

if (mysqli_query($connection, $query)) {
  echo 'Added new user';
} else {
  echo 'Error adding new user';
}
