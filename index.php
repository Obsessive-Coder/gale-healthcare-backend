<?php

include_once 'router/Request.php';
include_once 'router/Router.php';
include_once 'util/solutions/Question_1.php';
include_once 'util/solutions/Question_2.php';
include_once 'util/solutions/Question_3.php';
include_once 'util/solutions/Question_4.php';
include_once 'util/solutions/Question_5.php';
include_once 'util/solutions/Question_6.php';
include_once 'util/solutions/Question_7.php';
include_once 'util/solutions/Question_8.php';
include_once 'util/solutions/Question_9.php';

// Used below to bind routes to their handlers.
const ROUTES = array(
  'question1' => new Question_1(),
  'question2' => new Question_2(),
  'question3' => new Question_3(),
  'question4' => new Question_4(),
  'question5' => new Question_5(),
  'question6' => new Question_6(),
  'question7' => new Question_7(),
  'question8' => new Question_8(),
  'question9' => new Question_9(),
);

$router = new Router(new Request);

foreach (ROUTES as $key => $RouteHandler) {
  $router->get('/' . $key, fn ($request) => $RouteHandler->solve());
}

$router->post('/data', function ($request) {
  return json_encode($request->getBody());
});
