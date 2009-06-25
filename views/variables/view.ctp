<?php
$javascript->link('jquery.js', false);
$js = '
		function updateVariables() {
			$("#variables a[href*=\"delete\"]").click(function() {
				$("#variables").load(this.href, function() {updateVariables();});
				return false;
			});
		}
		$(document).ready(function(){
			updateVariables();
		});
';
$javascript->codeBlock($js, array('allowCache' => false, 'safe' => false, 'inline' => false));
?>
<h2>Variables for <?php echo $type; ?> '<?php echo $html->link($name, array('controller' => Inflector::pluralize(strtolower($type)), 'action' => 'view', $recordId), array('title' => $name)); ?>' - [ <?php echo $html->image('add.png', array('alt' => 'Add', 'url' => array('action' => 'add', strtolower($type), $recordId))); ?> ]</h2><hr class="hbar" />

<div id="variables" class="clear">
	<?php echo $this->element('variables', array('variables' => $variables)); ?>
</div>