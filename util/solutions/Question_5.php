<?php

include_once 'IQuestion.php';

class Question_5 implements IQuestion
{
  public function solve()
  {
    echo 'If I get an error while trying to run code locally and the database won\'nt connect I first ensure the database server and related services are running. After I confirm the service is running I will double check my database credentials and configuration. If this still doesn\'t work I will dig deeper into the error and leverage Google. I have always been able to connect to a database using this approach.';
  }
}
