<?php

include_once 'IQuestion.php';

class Question_7 implements IQuestion
{
  public function solve()
  {
    echo "This project is my first time using PHP, but I would handle it the same way as I would an error in any other language. My research shows that I can call the following methods to display different types of errors: \nini_set(display_errors', 1);\nini_set('display_startup_errors', 1);\nerror_reporting(E_ALL);\nI would begin by displaying these errors and then using the information provided to debug the issue. If the error gave a file and line number I would begin there, but if I can't use the error to solve it myself I would use Google to find other people that have had similar errors. After I found a solution online that solves the same error I would first understand the solution and then implement it. If it works then I move on with my life, else I would repeat the Google process. If I feel I have spent too much time on the error I would try to catch a teammate with a few minutes of free time in case they could quickly spot something I missed or provide more information from their experiences with the project and PHP.";
  }
}
