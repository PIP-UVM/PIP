<header>
<?php
print ' <img style="width: 150px; float:left; padding-right: 1em;" alt="Practice Integration Profile" src="imgs/pip.png">';
if($customSurvey->getCustomSurveyID()>1){
     print ' <img style="width: 150px; float:left; padding-right: 1em;" alt="' . $customSurvey->getTitle() . '" src="imgs/' . $customSurvey->getImageName() . '">';
}
print ' <h1>' . $customSurvey->getTitle() . '</h1>';	

print '</header>';

	// Include nav whenever we have a header
	include "components/nav.php";
?>
