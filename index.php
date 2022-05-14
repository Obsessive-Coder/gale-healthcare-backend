<?php

include_once 'router/Request.php';
include_once 'router/Router.php';
include_once 'util/solutions/Question_1.php';
include_once 'util/solutions/Question_2.php';

// Used below to bind routes to their handlers.
const ROUTES = array(
  'question1' => new Question_1(),
  'question2' => new Question_2(),
);

$router = new Router(new Request);

foreach (ROUTES as $key => $RouteHandler) {
  $router->get('/' . $key, fn ($request) => $RouteHandler::solve());
}

$router->post('/data', function ($request) {
  return json_encode($request->getBody());
});
