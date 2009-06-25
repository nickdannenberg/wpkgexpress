<style type="text/css">label {width: 80px;}</style>
<h2>Editing Package Action for '<?php echo $html->link($pkgName, array('controller'=>'packages', 'action'=>'view', $pkgId)); ?>'</h2><hr class="hbar" />
<?php echo $form->create("PackageAction", array("url" => "/packages/edit/action/$pkgActId")); ?>
<div class="inputwrap"><label for="PackageActionType" title="<?php echo TOOLTIP_PACKAGEACTION_TYPE; ?>"><span class="required">*</span>Type:</label><?php echo $form->input('type', array('label' => false, 'options' => array(ACTION_TYPE_INSTALL => 'Install', ACTION_TYPE_UPGRADE => 'Upgrade', ACTION_TYPE_DOWNGRADE => 'Downgrade', ACTION_TYPE_REMOVE => 'Remove'), 'div' => false)) ?></div>
<div class="inputwrap"><label for="PackageActionCommand" title="<?php echo TOOLTIP_PACKAGEACTION_COMMAND; ?>"><span class="required">*</span>Command:</label><?php echo $form->input('command', array('label' => false, 'class'=>'input', 'div' => false, 'size' => 50)) ?></div>
<div class="inputwrap"><label for="PackageActionTimeout" title="<?php echo TOOLTIP_PACKAGEACTION_TIMEOUT; ?>">Timeout:</label><?php echo $form->input('timeout', array('label' => false, 'class'=>'input', 'div' => false, 'size' => 10)) ?></div>
<div class="inputwrap"><label for="PackageActionWorkdir" title="<?php echo TOOLTIP_PACKAGEACTION_WORKDIR; ?>">Work Dir.:</label><?php echo $form->input('workdir', array('label' => false, 'class'=>'input', 'div' => false, 'size' => 50)) ?></div>
<?php echo $form->hidden('position'); ?>
<div class="inputwrap"><label>&nbsp;</label><?php echo $form->end('Submit'); ?></div>