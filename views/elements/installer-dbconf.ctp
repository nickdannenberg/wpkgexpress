<?php
if (!isset($dbconf))
	exit();

function boolString($bValue = false) {
	return ($bValue ? 'true' : 'false');
}

echo "<?php" . PHP_EOL;
?>
class DATABASE_CONFIG {

	var $default = array(
<?php
foreach ($dbconf as $k => $v)
	echo "		'$k' => " . (is_bool($v) ? boolString($v) : "'$v'") . "," . PHP_EOL;
?>
	);

}
<?php echo "?>" ?>