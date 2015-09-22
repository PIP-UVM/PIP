<!DOCTYPE html>
<html>

<head>
	<title>Practice Integration Profile</title>
	<meta charset="utf-8">
	<meta name="author" content="Simon Anguish">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="description" content="A Website for Vermont Integration Profile">

    <link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
    <link href="stylesheets/custom.css" media="screen" rel="stylesheet" type="text/css" />
	<!--[if IE]>
	    <link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!--[if lt IE 9]>
	    <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
	<![endif]-->

	<?php
		$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

    	require_once('lib/security.php');
		include "lib/validate-functions.php";
		include "lib/mail-message.php";

  /*      $domain = "https://";
        if (isset($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS']) {
                $domain = "https://";
            }
        }
*/
$domain = "//";
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");

        $domain .= $server;

        $path_parts = pathinfo($phpSelf);

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// include all libraries

	$yourURL = $domain . $phpSelf;

	$fileName = $path_parts['filename'];

	require_once("../../bin/myDatabase.php");

        include "Functions/functions.php";
        include "Classes/Question.php";
    	include "Classes/User.php";
	include "Classes/Survey.php";

	include "databaseTops/databaseReader.php";        
	include "Classes/CustomSurvey.php";
	$id = 1;
	if(isset($_GET["p"])){
   		$id = (int) $_GET["p"];
	}
	$customSurvey = new CustomSurvey($thisDatabaseR, $id);

//replaced with just plain javascript	
//	print '<script src="//code.jquery.com/jquery-1.10.2.js"></script>';

//        print '<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>';
	
//	include "js/script.js";

    ?>
</head>

<?php
	$data = array();
	$getArray = array();
	// Start the body tag which automatically has an id that matches the filename
	print "<body id='" . $fileName . "'>";
?>
