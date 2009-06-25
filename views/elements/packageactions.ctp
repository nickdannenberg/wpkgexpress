<?php if (!$packageActions || count($packageActions) == 0): ?>
	&lt;None&gt;
<?php else: ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th width="75">Type</th>
			<th>Command</th>
			<th width="105">Actions</th>
		</tr>
	<?php foreach($packageActions as $packageAction): ?>
		<tr>
			<td>
				<?php echo ucwords(constValToLCSingle('action_type', $packageAction['PackageAction']['type'])); ?>
			</td>
			<td><?php echo $html->link($packageAction['PackageAction']['command'], array('action'=>'view', 'action', $packageAction['PackageAction']['id'])) ?></td>
			<td>
				<?php
					$out = $html->image('go-top.png', array('url' => array('action' => 'movetop', 'action', $packageAction['PackageAction']['id'])));
					$out .= " " . $html->image('go-up.png', array('url' => array('action' => 'moveup', 'action', $packageAction['PackageAction']['id'])));
					$out .= " " . $html->image('go-down.png', array('url' => array('action' => 'movedown', 'action', $packageAction['PackageAction']['id'])));
					$out .= " " . $html->image('go-bottom.png', array('url' => array('action' => 'movebottom', 'action', $packageAction['PackageAction']['id'])));
					$out .= " " . $html->image('pencil.png', array('url' => array('action' => 'edit', 'action', $packageAction['PackageAction']['id'])));
					$out .= " " . $html->image('delete.png', array('url' => array('action' => 'delete', 'action', $packageAction['PackageAction']['id'])));
					echo $out;
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>