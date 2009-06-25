<h2>Add New Profile</h2><hr class="hbar" />
<?php echo $form->create('Profile'); ?>
<div class="inputwrap"><label for="ProfileIdText" title="<?php echo TOOLTIP_PROFILE_ID; ?>"><span class="required">*</span>ID:</label><?php echo $form->input('id_text', array('label' => false, 'div' => false, 'class'=>'input', 'size'=>'20', 'maxlength'=>'100')) ?></div>
<div class="inputwrap"><label for="ProfileNotes" title="<?php echo TOOLTIP_PROFILE_NOTES; ?>">Notes:</label><?php echo $form->input('notes', array('label' => false, 'div' => false, 'cols'=>'30', 'rows'=>'4')) ?></div>
<div class="inputwrap"><label>&nbsp;</label><?php echo $form->end('Submit'); ?></div>