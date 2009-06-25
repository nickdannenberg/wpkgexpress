<h2>Modifying additional associated Profiles for Host '<?php echo $html->link($hostName, array('action'=>'view', $hostID)); ?>'</h2><hr class="hbar" />
<?php echo $form->create('Host', array("url" => "/hosts/add/profile/$hostID")); ?>
<div class="inputwrap"><?php echo $form->input('Host.Profile', array('label' => false, 'multiple' => true, 'div' => false, 'selected' => $selected)); ?></div>
<?php echo $form->end('Submit'); ?>