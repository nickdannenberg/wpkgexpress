<h2>Modifying associated Packages for Profile '<?php echo $html->link($profileIDText, array('action'=>'view', $profileID)); ?>'</h2><hr class="hbar" />
<?php echo $form->create('Profile', array("url" => "/profiles/add/package/$profileID")); ?>
<div class="inputwrap"><?php echo $form->input('Profile.Package', array('label' => false, 'multiple' => true, 'div' => false, 'selected' => $selected)); ?></div>
<?php echo $form->end('Submit'); ?>