<?php if (!$variables || count($variables) == 0): ?>
	&lt;None&gt;
<?php else: ?>
	<ul>
		<?php
			foreach ($variables as $var) {
				if (isset($var['Variable']))
					$var = $var['Variable'];
				echo "<li>" . $var['name'] . "<span class=\"variable-equals\"> = </span>" . $var['value'] . " [ " . $html->image('pencil.png', array('url' => array('action' => 'edit', $var['id']))) . " " . $html->image('delete.png', array('url' => array('action' => 'delete', $var['id']))) . " ]";
			}
		?>
	</ul>
<?php endif; ?>