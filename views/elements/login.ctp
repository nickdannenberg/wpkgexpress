<?php
$javascript->link('jquery.js', false);
$javascript->codeBlock('$(document).ready(function(){ $("input:visible:enabled:first").focus(); })', array('allowCache' => false, 'safe' => false, 'inline' => false));

echo $form->create($dest, $url);
echo "<fieldset><legend>wpkgExpress Login</legend>";
if (!empty($criticalerrors)) {
	echo "<ul class=\"criticalerrors\">";
	foreach ($criticalerrors as $err)
		echo "<li>" . $err . "</li>";
	echo "</ul>";
}
echo $form->input('user', array('label' => 'Login: ', 'autocomplete' => 'off'));
echo $form->input('password', array('label' => 'Password: '));
echo "<hr />";
echo $form->end("Login");
echo "</fieldset>";
?>