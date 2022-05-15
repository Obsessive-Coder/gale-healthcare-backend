<?php

include_once 'IQuestion.php';

class Question_8 implements IQuestion
{
  public function solve()
  {
    // A URL shortener is a tool that takes a long and complex URL and compresses it to a short and clear link that is easier to share.

    // The process of URL shortening is pretty simple. URL shorteners generate a random string, map the main URL to the shortcode and provide a new URL. The two URLs are put in the database.

    // When you hit the shortened URL, the database checks the shortcode and redirects you to the main URL. The URL shortener gets a long URL and returns a short URL.

    echo 'I began with researching url shorteners and getting a basic understanding of how they function. Then I created 1 table in the existing database for this project to store the data about the url. The database table has columns "url" and "short_url". After the short url is generated and stored, the original url can be used to retrieve the shortened url.';
  }
}
