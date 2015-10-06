<?php
  $userSurveys = $newUser->getSurveys();

  // Get the most recently published survey name
  $query = "SELECT MAX(survey_name) AS survey_name ";
  $query .= "FROM Survey ";
  $query .= "WHERE NOT survey_name = 'Unpublished'";

  $results = $thisDatabase->select($query);
  $newestPublished = $results[0]['survey_name'];

  // Get the newest survey completed by the user
  $newestSurvey = max($userSurveys);
  $newestName = $newestSurvey['survey_name'];

  print "<div class='pickSurvey user_content'>";

  print "<p>You have started but have not completed the survey below. ";
  print "Click on the survey to recieve a new code.</p>";

  foreach ($userSurveys as $survey) {
    $record_id = sha1($survey['record_id']);

    print "<p><a href='?e=1&r=" . $record_id . "&ea=" . $email . "' class='currentSurveys'>" . $survey['survey_name'] . "</a></p>";
  }

  if ($newestPublished != $newestName) {
    print "<p><a href='?e=1&r=" . $survey['record_id'] . "&ea=" . $email . "' class='currentSurveys newestSurvey'>Start the newest survey.</a></p>";
  }

  print "</div>"; // End .pickSurvey
?>
