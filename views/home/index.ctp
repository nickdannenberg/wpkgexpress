<?php
$javascript->link('jquery.js', false);
$javascript->link('pretty.js', false);
$js = '$(document).ready(function(){
			$(".date").each(function(){ this.title = this.innerHTML; }).prettyDate();
			setInterval(function(){ $(".date").prettyDate(); }, 5000);
	   });
';
$javascript->codeBlock($js, array('allowCache' => false, 'safe' => false, 'inline' => false));
?>
<div id="stats-container">

<div class="statsblockLeft">
<h2>Packages</h2><hr class="hbar" />
<div class="inputwrap"><label style="width: 90px"># Enabled:</label><?php echo $packageCountEnabled ?></div>
<div class="inputwrap"><label style="width: 90px"># Disabled:</label><?php echo $packageCountDisabled ?></div>
<div class="inputwrap"><label style="width: 90px"># Total:</label><?php echo $packageCountTotal ?></div>
<div class="inputwrap"><label style="width: 90px">Last Modified:</label><ol class="reg">
	<?php
		foreach ($packageRecent as $pkg) {
			echo "<li>" . $html->link($pkg['Package']['name'], array('controller' => 'packages', 'action' => 'view', $pkg['Package']['id'])) . " (<div class=\"date\">" . date("Y-m-d h:i:s A", strtotime($pkg['Package']['modified'])) . "</div>)</li>";
		}
	?>
</ol></div>
</div>

<div class="statsblockRight">
<h2>Profiles</h2><hr class="hbar" />
<div class="inputwrap"><label style="width: 90px"># Enabled:</label><?php echo $profileCountEnabled ?></div>
<div class="inputwrap"><label style="width: 90px"># Disabled:</label><?php echo $profileCountDisabled ?></div>
<div class="inputwrap"><label style="width: 90px"># Total:</label><?php echo $profileCountTotal ?></div>
<div class="inputwrap"><label style="width: 90px">Last Modified:</label><ol class="reg">
	<?php
		foreach ($profileRecent as $prof) {
			echo "<li>" . $html->link($prof['Profile']['id_text'], array('controller' => 'profiles', 'action' => 'view', $prof['Profile']['id'])) . " (<div class=\"date\">" . date("Y-m-d h:i:s A", strtotime($prof['Profile']['modified'])) . "</div>)</li>";
		}
	?>
</ol></div>
</div>

<div class="statsblockLeft endOfRow">
<h2>Hosts</h2><hr class="hbar" />
<div class="inputwrap"><label style="width: 90px"># Enabled: </label><?php echo $hostCountEnabled ?></div>
<div class="inputwrap"><label style="width: 90px"># Disabled: </label><?php echo $hostCountDisabled ?></div>
<div class="inputwrap"><label style="width: 90px"># Total: </label><?php echo $hostCountTotal ?></div>
<div class="inputwrap"><label style="width: 90px">Last Modified:</label><ol class="reg">
	<?php
		foreach ($hostRecent as $host) {
			echo "<li>" . $html->link($host['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $host['Host']['id'])) . " (<div class=\"date\">" . date("Y-m-d h:i:s A", strtotime($host['Host']['modified'])) . "</div>)</li>";
		}
	?>
</ol></div>
</div>

</div>