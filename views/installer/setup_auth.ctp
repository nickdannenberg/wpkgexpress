<?php
echo $form->create('Installer', $url);
echo "<fieldset><legend>Step $step of $steps - " . $this->pageTitle . "</legend>";
if (isset($criticalerror)) {
	echo "<ul class=\"criticalerrors\">";
	echo "<li>" . $criticalerror . "</li>";
	echo "</ul>";
}
echo "<div class=\"installerHeader\">Web Access</div>";
echo $form->input('user', array('label' => 'Username: ', 'autocomplete' => "off"));
echo $form->input('password', array('label' => 'Password: '));
echo "<div class=\"installerHeader\">XML Feed Access</div>";
echo $form->input('protectxml', array('label' => 'Protect XML output: ', 'options' => array(1 => 'Yes', 0 => 'No')));
echo $form->input('xmluser', array('label' => 'XML Username: ', 'autocomplete' => "off"));
echo $form->input('xmlpassword', array('label' => 'XML Password: ', 'type' => 'password'));
echo "<hr />";
echo $form->end($submit);
echo "</fieldset>";
?>