<?php if (!$packages || count($packages) == 0): ?>
	&lt;None&gt;
<?php else: ?>
	<ul>
		<?php
			foreach ($packages as $package)
				echo "<li>" . $html->link($package['name'] . " (" . $package['id_text'] . ")", array('controller' => 'packages', 'action'=>'view', $package['id'])) . " [ " . $html->link($html->image('delete.png'), array('action' => "delete", $profile['Profile']['id'], $package['id']), array('title' => 'Delete this association'), null, false, false) . " ]</li>";
		?>
	</ul>
<?php endif; ?>