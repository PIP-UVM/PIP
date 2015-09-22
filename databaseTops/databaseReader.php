<?php
	$dbUserName = get_current_user() . '_reader';
	$whichPass = "r"; //flag for which one to use.
	$dbName = strtoupper(get_current_user()) . '_PROJECT';
	
	$thisDatabaseR = new myDatabase($dbUserName, $whichPass, $dbName);	
?>
