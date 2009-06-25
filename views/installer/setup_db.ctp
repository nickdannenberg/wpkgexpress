<?php
echo $form->create('Installer', $url);
echo "<fieldset><legend>Step $step of $steps - " . $this->pageTitle . "</legend>";
if (!empty($criticalerrors)) {
	echo "<ul class=\"criticalerrors\">";
	foreach ($criticalerrors as $err)
		echo "<li>" . $err . "</li>";
	echo "</ul>";
}
echo $form->input('driver', array('label' => 'Driver: ', 'options' => $drivers, 'default' => 'mysql'));
echo $form->input('persistent', array('label' => 'Persistent connection: ', 'options' => array(1 => 'Yes', 0 => 'No'), 'default' => 0));
echo $form->input('database', array('label' => 'Database name: '));
echo $form->input('host', array('label' => 'Host: ', 'default' => 'localhost'));
echo $form->input('port', array('label' => 'Port: ', 'default' => ''));
echo $form->input('login', array('label' => 'Login: ', 'autocomplete' => "off"));
echo $form->input('password', array('label' => 'Password: '));
echo "<hr />";
echo $form->end($submit);
echo "</fieldset>";
?>