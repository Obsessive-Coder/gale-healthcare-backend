<?php

include_once 'IQuestion.php';

class Question_2 implements IQuestion
{
  public function solve()
  {
    // DB Options.
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'gale_healthcare_db';

    // Connect to the server and database.
    $connection = mysqli_connect($host, $username, $password, $database);

    return 'abcd';

    // The first query from the challenge.
    $query1 = "SELECT u.userid, u.username, u.email, group_concat(ph.password SEPARATOR ',') passwords FROM  user u JOIN passwordhistory ph ON ph.userid = u.userid GROUP BY ph.userid;";

    // The second query from the challenge with dynamic userid.
    $query2 = "SELECT u.username, p.question, (SELECT COUNT(*) FROM pollvote WHERE pollid = p.pollid) AS voteCount FROM poll p JOIN pollvote pv ON pv.pollid = p.pollid JOIN user u ON u.userid = pv.userid WHERE u.userid = [userid];";

    $result1 = mysqli_query($connection, $query1);
    if ($result1) {
      $users = mysqli_fetch_all($result1, MYSQLI_ASSOC);
      $finalUsers = array();

      // Loop through each user and call the second query to get their polls.
      foreach ($users as $user) {
        // Replace the placeholder in query2 with this user's userid.
        $userid = $user['userid'];
        $updatedQuery = str_replace('[userid]', $userid, $query2);

        $result2 = mysqli_query($connection, $updatedQuery);
        if ($result2) {
          // Add polls to this user and push to array of all users.
          $polls = mysqli_fetch_all($result2, MYSQLI_ASSOC);
          $user['polls'] = $polls;
          array_push($finalUsers, $user);
        }
      }

      return json_encode($finalUsers);
    } else {
      return 'Error querying the database';
    }
  }
}
