<style type="text/css">label {width: 81px;}</style>
<h2>Editing Host '<?php echo $html->link($this->data['Host']['name'], array('action'=>'view', $this->data['Host']['id'])); ?>'</h2><hr class="hbar" />
<?php echo $form->create('Host'); ?>
<div class="inputwrap"><label for="HostEnabled" title="<?php echo TOOLTIP_HOST_ENABLED; ?>">Enabled:</label><?php echo $form->input('enabled', array('label' => false, 'div' => false)) ?></div>
<div class="inputwrap"><label for="HostName" title="<?php echo TOOLTIP_HOST_NAME; ?>"><span class="required">*</span>Name:</label><?php echo $form->input('name', array('label' => false, 'div' => false, 'class'=>'input', 'size'=>'20', 'maxlength'=>'100')) ?></div>
<div class="inputwrap"><label for="HostNotes" title="<?php echo TOOLTIP_HOST_NOTES; ?>">Notes:</label><?php echo $form->input('notes', array('label' => false, 'div' => false, 'cols'=>'30', 'rows'=>'4')) ?></div>
<div class="inputwrap"><label for="HostMainprofileId" title="<?php echo TOOLTIP_HOST_MAINPROFILE; ?>">Main Profile:</label><?php echo $form->input('Host.mainprofile_id', array('label' => false, 'div' => false, 'options' => $profiles, 'selected' => $selected)) ?></div>
<div class="inputwrap"><label>&nbsp;</label><?php echo $form->end('Submit'); ?></div>