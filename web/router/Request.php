<?php
include_once 'IRequest.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/util/Helper.php';

class Request implements IRequest
{
  function __construct()
  {
    foreach ($_SERVER as $key => $value) {
      $this->{Helper::toCamelCase($key)} = $value;
    }
  }

  /**
   * Build the body 'object' from the POST request.
   * @param route (string)
   */
  public function getBody()
  {
    if ($this->requestMethod == 'POST') {
      $body = array();

      foreach ($_POST as $key => $value) {
        $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }

      return $body;
    }

    return;
  }
}
