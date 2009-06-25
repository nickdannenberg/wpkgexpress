<h2>Tasks</h2><hr class="hbar" />
<fieldset style="margin-left: 30px; width: 500px">
<legend>Import</legend>
<?php
echo $form->create('Import', array('url' => array('controller' => 'admin', 'action' => 'index'), 'enctype' => 'multipart/form-data'));
echo $form->input('Import.packages', array('label' => 'Packages: ', 'div' => false, 'after' => '<br />', 'type' => 'file'));
echo $form->input('Import.profiles', array('label' => 'Profiles: ', 'div' => false, 'after' => '<br />', 'type' => 'file'));
echo $form->input('Import.hosts', array('label' => 'Hosts: ', 'div' => false, 'type' => 'file'));
echo $form->end('Import');
?>
</fieldset>
<br />
<fieldset style="margin-left: 30px; width: 500px">
<legend>Export</legend>
<?php echo $html->link('Packages', array('controller' => 'packages', 'action' => 'index.xml')); ?><br />
<?php echo $html->link('Profiles', array('controller' => 'profiles', 'action' => 'index.xml')); ?><br />
<?php echo $html->link('Hosts', array('controller' => 'hosts', 'action' => 'index.xml')); ?><br />
</fieldset>

<h2>Settings</h2><hr class="hbar" />
<fieldset class="xmlsettings" style="margin-left: 30px; width: 500px">
<legend>XML Feed Access</legend>
<?php
echo $form->create('XMLFeed', array('url' => array('controller' => 'admin', 'action' => 'index')));
echo $form->input('XMLFeed.protectxml', array('label' => 'Protect XML output: ', 'class' => 'input' . (in_array('protectxml', array_keys($xmlFeedAccessErrs)) ? ' form-error' : ''), 'div' => false, 'after' => (in_array('protectxml', array_keys($xmlFeedAccessErrs)) ? '<div class="error-message">' . $xmlFeedAccessErrs['protectxml'] . '</div>' : '') . '<br />', 'options' => array(true => 'Yes', false => 'No')));
echo $form->input('XMLFeed.xmluser', array('label' => 'Username: ', 'class' => 'input' . (in_array('xmluser', array_keys($xmlFeedAccessErrs)) ? ' form-error' : ''), 'div' => false, 'after' => (in_array('xmluser', array_keys($xmlFeedAccessErrs)) ? '<div class="error-message">' . $xmlFeedAccessErrs['xmluser'] . '</div>' : '') . '<br />', 'autocomplete' => "off"));
echo $form->input('XMLFeed.xmlpassword', array('label' => 'Password: ', 'class' => 'input' . (in_array('xmlpassword', array_keys($xmlFeedAccessErrs)) ? ' form-error' : ''), 'div' => false, 'after' => (in_array('xmlpassword', array_keys($xmlFeedAccessErrs)) ? '<div class="error-message">' . $xmlFeedAccessErrs['xmlpassword'] . '</div>' : '')));
echo $form->end('Save');
?>
</fieldset>