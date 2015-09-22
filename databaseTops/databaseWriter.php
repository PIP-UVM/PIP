<?php
	$dbUserName = get_current_user() . '_writer';
	$whichPass = "w"; //flag for which one to use.
	$dbName = strtoupper(get_current_user()) . '_PROJECT';
	
	$thisDatabase = new myDatabase($dbUserName, $whichPass, $dbName);
?>
