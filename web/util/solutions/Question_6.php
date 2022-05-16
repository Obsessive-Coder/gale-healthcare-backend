<?php

/**
 * IMPORTANT: This is the php solution ONLY used for consistency with the app.
 * This is not my submitted solution.
 * My solution is a javascript file as the challenge requires.
 * The solution is in /util/solutions/Question_6.js
 */

include_once 'IQuestion.php';

class Question_6 implements IQuestion
{
  public function solve()
  {
    $numbers = $this->getNumbers();
    $duplicateNumbers = $this->getDuplicates($numbers);

    // Sort the duplicates in ascending order.
    sort($duplicateNumbers);

    return json_encode($duplicateNumbers);
  }

  private function getNumbers()
  {
    // Make the array of 200 numbers with duplicates.

    $count = 0;
    $number = rand(1, 999999);
    $numbers = array();

    while ($count < 200) {
      array_push($numbers, $number);

      // Get a number 0 or 1. If 1 then reuse the number, else make new number.
      $isDuplicate = rand(0, 1);
      if (!$isDuplicate) {
        $number = rand(1, 999999);
      }

      // Increment count for array length.
      $count++;
    }

    return $numbers;
  }

  private function getDuplicates($numbers)
  {
    $duplicates = array();

    for ($i = 0; $i < count($numbers); $i++) {
      $firstNumber = $numbers[$i];

      // Skip this number if its duplicates have already been added.
      if (in_array($firstNumber, $duplicates)) continue;

      for ($j = 0; $j < count($numbers); $j++) {
        $secondNumber = $numbers[$j];

        // Add to the duplicate if they're different indices and the same number.
        $isDifferentIndex = $i !== $j;
        $isSameNumber = $firstNumber === $secondNumber;

        if ($isDifferentIndex && $isSameNumber) {
          array_push($duplicates, $firstNumber);
        }
      }
    }

    return $duplicates;
  }
}
