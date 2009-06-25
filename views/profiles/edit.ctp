<style type="text/css">label {width: 93px;}</style>
<h2>Editing Profile '<?php echo $html->link($name, array('action'=>'view', $this->data['Profile']['id'])); ?>'</h2><hr class="hbar" />
<?php echo $form->create('Profile'); ?>
<div class="inputwrap"><label for="ProfileEnabled" title="<?php echo TOOLTIP_PROFILE_ENABLED; ?>">Enabled:</label><?php echo $form->input('enabled', array('label' => false, 'div' => false)) ?></div>
<div class="inputwrap"><label for="ProfileIdText" title="<?php echo TOOLTIP_PROFILE_ID; ?>"><span class="required">*</span>ID:</label><?php echo $form->input('id_text', array('label' => false, 'div' => false, 'class'=>'input', 'size'=>'20', 'maxlength'=>'100')) ?></div>
<div class="inputwrap"><label for="ProfileNotes" title="<?php echo TOOLTIP_PROFILE_NOTES; ?>">Notes:</label><?php echo $form->input('notes', array('label' => false, 'div' => false, 'cols'=>'30', 'rows'=>'4')) ?></div>
<div class="inputwrap"><label for="ProfileDependency" title="<?php echo TOOLTIP_PROFILE_DEPENDSON; ?>">Dependencies:</label><?php
	if (count($profileDependencies) > 0)
		echo $form->input('ProfileDependency', array('label' => false, 'multiple' => true, 'div' => false));
	else
		echo "No other Profiles to choose from.";
?></div>
<div class="inputwrap"><label>&nbsp;</label><?php echo $form->end('Submit'); ?></div>