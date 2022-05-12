<?php

include_once 'router/Request.php';
include_once 'router/Router.php';
include_once 'util/solutions/Question_1.php';
include_once 'util/solutions/Question_2.php';

$router = new Router(new Request);

$router->get('/question1', function ($request) {
  return Question_1::solve();
});

$router->get('/question2', function ($request) {
  return Question_2::solve();
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
