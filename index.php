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
