<?php

  $email = htmlentities($_GET['ea']);
  $record_id = htmlentities($_GET['r']);

  $code = safeRand();

  session_start();

  $_SESSION['code'] = $code;

  $sent = sendCode($code, $email);

?>

<form method=post class='codeBox'>

  <fieldset class='txtCode'>
<h2>Do not leave or refresh this page. Please wait for your security code to be sent to you.</h2>
<p>Check your email for your survey code and enter it below to continue.</p>
    <input type='text' name='txtCode' placeholder='Code' class='validate_txt_input'>
    <input type='submit' name='btnSubmitCode' value='Start Survey'>
  </fieldset>
<p style='line-height: 200%;'>NOTE: most times you will recieve the email in a minute or less but if internet traffic is high some users have reported ten mintues. So please be patient.</p>
</form>
