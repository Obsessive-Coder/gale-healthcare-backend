<?php

include_once 'IQuestion.php';

const PROBLEM_DATA = 'Thethe rain in spainspain falls mainly in the plainplain. The old manman is not here rightright now. When will he be backback? Saturday is the bestbest dayday of the week! I likelike it because I get to sleep inin.';

class Question_1 implements IQuestion
{
  public function solve()
  {
    // Split the sentences into words.
    $sentences = explode(' ', PROBLEM_DATA);

    $solution = '';

    foreach ($sentences as $key => $word) {
      // Replace a period with an empty char.
      $replacedWord = str_replace('.', '', $word, $periodCount);

      $punctuation = '';

      // These nested if statements are ugly and I would refactor with more time and research.
      // Get the removed punctuation so it can be added back for the solution.
      if ($periodCount > 0) {
        $punctuation = '.';
      } else {
        $replacedWord = str_replace('?', '', $word, $questionCount);

        if ($questionCount > 0) {
          $punctuation = '?';
        } else {
          $replacedWord = str_replace('!', '', $word, $exclamationCount);
          if ($exclamationCount > 0) {
            $punctuation = '!';
          }
        }
      }

      // Not all words with even chars are repeats, but all repeats will have an even number of chars.
      $isEvenChars = strlen($replacedWord) % 2 === 0;
      if ($isEvenChars) {
        // Split the word in half and destructure each substring.
        $halvedChars = str_split($replacedWord, strlen($replacedWord) / 2);
        list($first, $second) = $halvedChars;

        // If both substrings are the same then it's a repeated word.
        // NOTE: This will fail for words like 'meme', 'toto', and other made of duplicate words.
        if (strtolower($first) === strtolower($second)) {
          $replacedWord = $first;
        }
      }

      // Concatenate the formatted word with the running solution.
      $solution = $solution . ' ' . $replacedWord . $punctuation;
    }

    return $solution;
  }
}
