<?php
	// Include the head information
	include "components/top.php";

	// Include the header (with the nav)
	include "components/header.php";
?>
	<section class='mainContent'>
<?php

print $customSurvey->getMainContent();

?>
	</section>
	<?php
		// Include the footer
		include "components/footer.php";
	?>
	</body>
</html>
