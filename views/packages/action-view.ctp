<?php
$javascript->link('jquery.js', false);
$js = ' 
		function updateExitCodes() {
			$("#exitcodes a[href*=\"delete\"]").click(function() {
				$("#exitcodes").load(this.href, function() {updateExitCodes();});
				return false;
			});
		}
		$(document).ready(function(){
			updateExitCodes();
	    });
';
$javascript->codeBlock($js, array('allowCache' => false, 'safe' => false, 'inline' => false));
?>
<style type="text/css">label {width: 80px;}</style>
<h2>Package Action Details for '<?php echo $html->link($packageAction['Package']['name'], array('controller'=>'packages', 'action'=>'view', $packageAction['Package']['id'])); ?>' - [ <?php echo $html->image('pencil.png', array('alt' => 'Edit', 'url' => array('action' => 'edit', 'action', $packageAction['PackageAction']['id']))) . "&nbsp;" . $html->link($html->image('delete.png'), array('action'=>'delete', 'action', $packageAction['PackageAction']['id']), array('alt' => 'Delete'), "Are you sure you wish to delete this package action and all associated exit codes?", false); ?> ]</h2><hr class="hbar" />
<div class="inputwrap"><label title="<?php echo TOOLTIP_PACKAGEACTION_TYPE; ?>">Type:</label><?php 
	switch ($packageAction['PackageAction']['type']) {
		case ACTION_TYPE_INSTALL: echo 'Install'; break;
		case ACTION_TYPE_UPGRADE: echo 'Upgrade'; break;
		case ACTION_TYPE_DOWNGRADE: echo 'Downgrade'; break;
		case ACTION_TYPE_REMOVE: echo 'Remove'; break;
		default: echo 'Unknown';
	}
?></div>
<div class="inputwrap"><label title="<?php echo TOOLTIP_PACKAGEACTION_COMMAND; ?>">Command:</label><?php echo $packageAction['PackageAction']['command'] ?></div>
<div class="inputwrap"><label title="<?php echo TOOLTIP_PACKAGEACTION_TIMEOUT; ?>">Timeout:</label><?php echo $packageAction['PackageAction']['timeout'] ?></div>
<div class="inputwrap"><label title="<?php echo TOOLTIP_PACKAGEACTION_WORKDIR; ?>">Work Dir.:</label><?php echo $packageAction['PackageAction']['workdir'] ?></div>

<h2>Exit Codes - [ <?php echo $html->image('add.png', array('alt' => 'Add', 'url' => array('action' => 'add', 'exitcode', $packageAction['PackageAction']['id']))) ?> ]</h2><hr class="hbar" />
<div id="exitcodes" class="clear">
	<?php echo $this->element('exitcodes', array('exitcodes' => $packageAction['ExitCode'])); ?>
</div>