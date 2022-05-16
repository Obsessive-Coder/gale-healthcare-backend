<?php

include_once 'IQuestion.php';

class Question_8 implements IQuestion
{
  public function solve()
  {
    echo 'I have never made a url shortener so I wouldn\'t be able to write the function without first following a tutorial. I am all about tutorials and followed several for the PHP portions of these challenges. However, I feel this would be too specific and I would use too much of the code from the tutorial.

    Considering this, I still did some research and feel that I understand enough to describe a large portion of the steps required to achieve this.
    


    I would create 1 table in a database for this project to store the url, short url, and a unique id. After the short url is generated and stored, the original url can be used to retrieve the shortened url. Generating the url doesn\'t seem too difficult and is a matter of converting the long url into readable a string by mapping the url chars to letters and numbers, but I must admit I didn\'t fully understand the code examples that I looked at. In the real world I would spend enough time to implement some of the code examples I saw and come up with a unique solution that solves the company\'s/client\'s needs.';
  }
}
