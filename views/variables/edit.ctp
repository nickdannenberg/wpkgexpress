<style type="text/css">label {80px;}</style>
<h2>Editing Variable for <?php echo $type; ?> '<?php echo $html->link($name, array('controller' => Inflector::pluralize(strtolower($type)), 'action' => 'view', $recordId), array('title' => $name)); ?>'</h2><hr class="hbar" />
<?php echo $form->create('Variable', array('url' => array(strtolower($type), $recordId))); ?>
<div class="inputwrap"><label for="VariableName"><span class="required">*</span>Name:</label><?php echo $form->input('name', array('label' => false, 'class' => 'input', 'div' => false, 'size' => 15)) ?></div>
<div class="inputwrap"><label for="VariableValue"><span class="required">*</span>Value:</label><?php echo $form->input('value', array('label' => false, 'class' => 'input', 'div' => false, 'size' => 45)) ?></div>
<div class="inputwrap"><label>&nbsp;</label><?php echo $form->end('Submit'); ?></div>