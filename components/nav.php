<nav style="height: none;">
<!--	<h1>Vermont Integration Profile</h1>
-->	<ol style="float:none;">
		<li><a href='index.php'>Home</a></li>

		<?php
			if ($fileName == 'survey' || $fileName == 'surveyTool' || $fileName == 'login') {
				print "<li><a href='login.php'>Survey</a></li>";
				print "<li><a href='surveyTool.php?viewQuestions'>Admin Tools</a></li>";
			}

			else {
				print "<li><a href='http://integrationacademy.ahrq.gov/sites/default/files/Lexicon.pdf' target='_blank'>Lexicon</a></li>";
				print "<li><a href='integrationScenarios.php'>Integration Scenarios</a></li>";
				print "<li><a href='about.php'>About PIP</a></li>";
				print "<li><a href='login.php'>Survey</a></li>";
			}
		?>

		<div class='divPush'></div>
	</ol>
</nav>
