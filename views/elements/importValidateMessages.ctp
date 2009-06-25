<?php
echo "Uploaded " . ucwords($type) . " failed to pass XSD schema validation";
echo "<div class=\"messagesList\">";
foreach ($data as $msgtype => $messages) {
	echo "$msgtype<ul>";
	foreach ($messages as $msginfo) {
		echo "<li>" . $msginfo['message'] . " (line " . $msginfo['line'] . ")</li>";
	}
	echo "</ul></li>";
}
echo "</div>";
?>