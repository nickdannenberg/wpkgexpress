<?php if (!$exitcodes || count($exitcodes) == 0): ?>
	&lt;None&gt;
<?php else: ?>
	<ul>
		<?php
			foreach ($exitcodes as $exitcode) {
				if (isset($exitcode['ExitCode']))
					$exitcode = $exitcode['ExitCode'];
					
				switch ($exitcode['reboot']) {
					case EXITCODE_REBOOT_TRUE: $reboot = "Yes"; break;
					case EXITCODE_REBOOT_DELAYED: $reboot = "Delayed"; break;
					case EXITCODE_REBOOT_POSTPONED: $reboot = "Postponed"; break;
					case EXITCODE_REBOOT_FALSE: $reboot = "None"; break;
					default: $reboot = "Unknown";
				}
				echo "<li>" . $exitcode['code'] . " (Reboot: $reboot) [ " . $html->link($html->image('pencil.png'), array('action' => 'edit', 'exitcode', $exitcode['id']), null, false, false) . " " . $html->link($html->image('delete.png'), array('action'=>'delete', 'exitcode', $exitcode['id']), array('escape' => false), false) . " ]</li>";
			}
		?>
	</ul>
<?php endif; ?>