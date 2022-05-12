<?php

include_once 'router/Request.php';
include_once 'router/Router.php';
include_once 'util/Solutions.php';

$router = new Router(new Request);

$router->get('/', function () {
  return <<<HTML
  <h1>Hello world</h1>
HTML;
});

$router->get('/question1', function ($request) {
  return Solutions::question1();
});

$router->post('/data', function ($request) {
  return json_encode($request->getBody());
});

// DB Options.
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'gale_healthcare_db';

// // Connect to the server and database.
// $connection = mysqli_connect($host, $username, $password, $database);

// $recText = $_POST['text'];
// $query = "INSERT INTO user(username) VALUES('$recText')";

// if (mysqli_query($connection, $query)) {
//   echo 'Added new user.';
// } else {
//   echo 'Error adding new user.';
// }
