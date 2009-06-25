<?php
function constsToWords($prefix, $skipWords = false) {
	$constants = array();
	foreach (get_defined_constants() as $k => $v) {
		if (strpos($k, stristr($k, $prefix)) === 0) {
			$keylower = strtolower(substr($k, strlen($prefix)));
			if ($skipWords !== false)
				$keylower = implode("_", array_slice(explode("_", $keylower), $skipWords+1));
			if (substr($keylower, 0, 1) == "_")
				$keylower = substr($keylower, 1);
			$constants[constant($k)] = ucwords(str_replace("_", " ", $keylower));
		}
	}
	return $constants;
}

function constsVals($prefix) {
	$constants = array();
	foreach (get_defined_constants() as $k => $v) {
		if (strpos($k, stristr($k, $prefix)) === 0)
			$constants[] = constant($k);
	}
	return $constants;
}

function constValToLCSingle($prefix, $val, $keepUnderscore = false, $skipWords = false, $useUnknown = true) {
	$name = ($useUnknown ? "Unknown" : null);
	foreach (get_defined_constants() as $k => $v) {
		if (strpos($k, stristr($k, $prefix)) === 0 && $v == $val) {
			$k = strtolower(substr($k, strlen($prefix)));
			if ($skipWords !== false)
				$k = implode("_", array_slice(explode("_", $k), $skipWords+1));
			$name = $k;
			if (substr($name, 0, 1) == "_")
				$name = substr($name, 1);
			if ($keepUnderscore !== true) {
				$replace = ($keepUnderscore === false ? "" : $keepUnderscore);
				$name = str_replace("_", $replace, $name);
			}
			break;
		}
	}
	return $name;
}
?>