<style type="text/css">label {width: 81px;}</style>
<h2>Add New Host</h2><hr class="hbar" />
<?php echo $form->create('Host'); ?>
<div class="inputwrap"><label for="HostName" title="<?php echo TOOLTIP_HOST_NAME; ?>"><span class="required">*</span>Name:</label><?php echo $form->input('name', array('label' => false, 'div' => false, 'class'=>'input', 'size'=>'20', 'maxlength'=>'100')) ?></div>
<div class="inputwrap"><label for="HostNotes" title="<?php echo TOOLTIP_HOST_NOTES; ?>">Notes:</label><?php echo $form->input('notes', array('label' => false, 'div' => false, 'cols'=>'30', 'rows'=>'4')) ?></div>
<div class="inputwrap"><label for="HostMainprofileId" title="<?php echo TOOLTIP_HOST_MAINPROFILE; ?>">Main Profile:</label><?php echo $form->input('Host.mainprofile_id', array('label' => false, 'div' => false, 'options' => $profiles)) ?></div>
<div class="inputwrap"><label>&nbsp;</label><?php echo $form->end('Submit'); ?></div>