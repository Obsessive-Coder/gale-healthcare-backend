<?php

include_once 'IQuestion.php';

class Question_5 implements IQuestion
{
  public function solve()
  {
    return 'If I get an error while trying to run code locally and the database won\'t connect I first ensure the database server and related servers and services are running. After I confirm the service is running I will double check my database credentials and configuration. Connection errors are almost always solved with these checks, but if this still doesn\'t work I will dig deeper into the error and leverage Google.';
  }
}
