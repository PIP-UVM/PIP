<?php

// intialize variables
$version = 'Version: No Filter';
$practiceName = 'Practice Name: No Filter';



	if (isset($_POST['btnSearch'])) {
		if ($_POST['version'] != 'Version: No Filter' && $_POST['practiceName'] != 'Practice Name: No Filter') {
			$version = htmlentities($_POST['version']);
			$searchData[] = $version;

			$practiceName = htmlentities($_POST['practiceName']);
			$searchData[] = $practiceName;

			$criteria = " WHERE survey_name = ? AND prname = ?";
		} elseif ($_POST['version'] != 'Version: No Filter' && $_POST['practiceName'] == 'Practice Name: No Filter') {
			$version = htmlentities($_POST['version']);
			$searchData[] = $version;

			$criteria = " WHERE survey_name = ?";
		} elseif ($_POST['version'] == 'Version: No Filter' && $_POST['practiceName'] != 'Practice Name: No Filter') {
			$practiceName = htmlentities($_POST['practiceName']);
			$searchData[] = $practiceName;

			$criteria = " WHERE prname = ?";
		} else {
			$criteria = "";
		}
	}

	if (isset($_POST['btnReinvite'])) {
		$newSurvey = htmlentities($_POST['oldInvite']);

		$users = array();

		foreach ($_POST as $key => $value) {
			if ($value == 'checkUser') {
				$userRecord = ltrim(htmlentities($key), 'invite');

				$users[] = $userRecord;
			}
		}

		foreach ($users as $userRecord) {
			$data = array();
			$data[] = $userRecord;

			// Get the email address of the user with this record id
			$query = "SELECT email ";
			$query .= "FROM Responses ";
			$query .= "WHERE record_id = ?";

			$results = $thisDatabase->select($query, $data);

			$email = htmlentities($results[0]['email']);

			$data = array();
			$data[] = $email;
			$data[] = $newSurvey;

			$query = "INSERT INTO Responses ";
			$query .= "(email, survey_name) ";
			$query .= "VALUES (?, ?)";

			$results = $thisDatabase->insert($query, $data);

			$newRecord = $thisDatabase->lastInsert();

			$sent = sendInvitation($newRecord, $email);
		}
	}

	if (isset($_GET['del'])) {
		$userRecord = htmlentities($_GET['del']);

		$data = array();
		$data[] = $userRecord;
		
		$query = "SELECT email ";
		$query .= "FROM Responses ";
		$query .= "WHERE record_id = ?";
	
		$results = $thisDatabase->select($query, $data);
		
		$user_email = $results[0]['email'];

		/*
			I should make a Class for responses
		*/
		$query = "DELETE FROM Responses ";
		$query .= "WHERE record_id = ?";

		$results = $thisDatabase->delete($query, $data);
		
		// Check if the user ecists in the Responses table at all
		// If not, delete from users
		
		$data = array();
		$data[] = htmlentities($user_email);
		
		$query = "SELECT email ";
		$query .= "FROM Responses ";
		$query .= "WHERE email = ?";
		
		$results = $thisDatabase->select($query, $data);
		
		if (empty($results)) {
			$query = "DELETE FROM Users ";
			$query .= "WHERE user_email = ?";
			
			$results = $thisDatabase->delete($query, $data);
		}
	}

	print "<form method=post class='sortBar'>";
	print "Filter By: ";

	print "<select name='version'>";
	print "<option ";
print "value='Version: No Filter' ";
if ($version == 'Version: No Filter') print ' selected="selected" ';
print ">Version: No Filter</option>";

	// Get all the versions
	$query = "SELECT survey_name ";
	$query .= "FROM Survey";

	$results = $thisDatabase->select($query);

	foreach ($results as $survey) {
		print "<option value='" .  $survey['survey_name']  . "'";
if ($version ==  $survey['survey_name']) print ' selected="selected" ';

print ">" . $survey['survey_name'] . "</option>";
	}

	print "</select>";

	$query = "SELECT DISTINCT prname ";
	$query .= "FROM Responses";

	print "<select name='practiceName'>";
	print "<option ";
print "value='Practice Name: No Filter' ";
if ($practiceName == 'Practice Name: No Filter') print ' selected="selected" ';
print ">Practice Name: No Filter</option>";

	$results = $thisDatabase->select($query);

	foreach ($results as $practice) {
		print "<option value='" . $practice['prname'] . "'";
if ($practiceName ==  $practice['prname']) print ' selected="selected" ';

print ">" . $practice['prname'] . "</option>";
	}

	print "</select>";

	print "<input type=submit value='Search' name='btnSearch'>";
	print "</form>";

	// Get all of the User information
	$query = "SELECT record_id, email, prname, survey_name ";
	$query .= "FROM Responses";
	$query .= $criteria;

	// print $query;

	// print_r($searchData);

	$results = $thisDatabase->select($query, $searchData);

	// print_r($results);

	print "<form method=post class='inviteToOld'>";

	print "<table class='userList'>";

	print "<tr>";
	print "<th></th>";
	print "<th>Email</th>";
	print "<th>Survey Version</th>";
	print "<th>Practice Name</th>";
	print "<th>Delete User</th>";
	print "</tr>";

	foreach ($results as $user) {
		print "<tr>";
		print "<td><input type=checkbox name='invite" . $user['record_id'] . "' value='checkUser'></td>";
		print "<td><a href='?viewQuestions&u=" . $user['record_id'] . "' title='View User Responses'>" . $user['email'] . "</a></td>";
		print "<td>" . $user['survey_name'] . "</td>";
		print "<td>" . $user['prname'] . "</td>";

		print "<td><a style='color: red;' href='?viewUsers&del=" . $user['record_id'] . "' title='Delete'>X</a></td>";
		print "</tr>";
	}

	print "</table>";

	// Invite to older versions
	print "<div class='old_invite_bar'>";
	print "Send these users a link to version ";

	$query = "SELECT survey_name ";
	$query .= "FROM Survey ";
	$query .= "WHERE survey_name LIKE 'VIP%'";

	$results = $thisDatabase->select($query);

	print "<select name='oldInvite'>";

	foreach ($results as $survey) {
		print "<option>" . $survey['survey_name'] . "</option>";
	}

	print "</select>";

	print "<input type=submit name='btnReinvite' value='Send'>";

	print "</div>";

	print "</form>"; // Ends inviteToOld
?>
