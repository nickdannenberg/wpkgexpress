<?php if (!$profiles || count($profiles) == 0): ?>
	&lt;None&gt;
<?php else: ?>
	<ul>
		<?php
			foreach ($profiles as $profile)
				echo "<li>" . $html->link($profile['id_text'], array('controller' => 'profiles', 'action'=>'view', $profile['id'])) . " [ " . $html->link($html->image('delete.png'), array('action' => "delete", $host['Host']['id'], $profile['id']), array('title' => 'Delete this association'), null, false, false) . " ]</li>";
		?>
	</ul>
<?php endif; ?>