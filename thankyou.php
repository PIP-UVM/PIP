<style>
.redirectingText {
	text-align: center;
	font-family: sans-serif;
	font-size: 1.5em;
	width: 80%;
	margin: 2em auto;
	font-weight: 100;
}

.exclamation {
	font-size: 10em;	
	text-align: center;
}</style>

<?php
	include "components/top.php";
	?>

<body class='loaderBody'>
	
	<?php
		include "components/nav.php";
		?>

<p class='redirectingText'>Thank you for completing the survey. </p>
<p class='redirectingText'>You will receive an email in the next couple minutes.</p>


</body>
<?php
	exec("python JRH-barchart.py");

// 	header ("Refresh: 5;url=login.php");
?>
