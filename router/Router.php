<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/util/Helper.php';

const SUPPORTED_HTTP_METHODS = array('GET', 'POST');

class Router
{
  private $request;

  function __construct(IRequest $request)
  {
    $this->request = $request;
  }

  function __call($requestName, $args)
  {
    list($route, $method) = $args;

    $upperName = strtoupper($requestName);

    // Call the 404 handler if it's an unsupported request.
    if (!in_array($upperName, SUPPORTED_HTTP_METHODS)) {
      $this->invalidMethodHandler();
    }

    $lowerName = strtolower($requestName);
    $formattedRoute = Helper::formatRoute($route);
    $this->{$lowerName}[$formattedRoute] = $method;
  }

  /**
   * Removes trailing forward slashes from the right of the route.
   * @param route (string)
   */
  private function formatRoute($route)
  {
    $result = rtrim($route, '/');
    if ($result === '') {
      return '/';
    }
    return $result;
  }

  // Sends a 405 of unsupported request methods.
  private function invalidMethodHandler()
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
  }

  // Sends a 404 for unknown routes.
  private function defaultRequestHandler()
  {
    header("{$this->request->serverProtocol} 404 Not Found");
  }

  /**
   * Resolves a route.
   */
  function resolve()
  {
    $requestMethod = strtolower($this->request->requestMethod);
    $requestUri = $this->request->requestUri;
    $methodDictionary = $this->{$requestMethod};
    $formattedRoute = Helper::formatRoute($requestUri);
    $method = $methodDictionary[$formattedRoute];

    // Send 404 if it's an unknown method.
    if (is_null($method)) {
      $this->defaultRequestHandler();
      return;
    }

    echo call_user_func_array($method, array($this->request));
  }

  function __destruct()
  {
    $this->resolve();
  }
}
