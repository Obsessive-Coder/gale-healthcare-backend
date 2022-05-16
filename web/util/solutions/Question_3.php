<?php

include_once 'IQuestion.php';

class Question_3 implements IQuestion
{
  public function solve()
  {
    $firstQuestions =  $this->getQuestionNumbers();

    // Splice out all but the first questions.
    $restQuestions = array_splice($firstQuestions, 5);

    // Get 35 random questions from the remaining question pool.
    $randomQuestions = $this->getRandomQuestions($restQuestions);

    // Merge and shuffle questions for final result.
    $finalQuestions = array_merge($firstQuestions, $randomQuestions);
    shuffle($finalQuestions);

    return json_encode($finalQuestions);
  }

  private function getQuestionNumbers()
  {
    // Returns an array of numbers 1 through 70 to represent the test questions.
    $questions = array();

    $number = 1;
    while ($number <= 70) {
      array_push($questions, $number++);
    }

    return $questions;
  }

  private function getRandomQuestions($questions)
  {
    // Get 35 random questions from the remaining questions.
    $randomKeys = array_rand($questions, 35);
    return array_map(fn ($key) => $questions[$key], $randomKeys);
  }
}
