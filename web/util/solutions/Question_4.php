<?php

include_once 'IQuestion.php';

class Question_4 implements IQuestion
{
  public function solve()
  {
    return 'My solution for this is to create a unique route without visiting anything twice except the starting location as the final stop. Each new route total time would then need to be compared to the previous route\'s time. If the new route is quicker then it becomes the new quickest route. In order to get the travel times between all locations in a timely fashion I would need to write a script that consumes Google Maps data and I feel this is out of scope of the challenge and even too much for a coding challenge considering the number of other questions. I know there is a better solution than the brute force method I mentioned above, but I don\'t know it without specifically looking up this code challenge which would be cheating. In the real world if I was tasked with this I would ensure my team and superiors understood the additional requirements and time I would need to research routing algorithms.';
  }
}
