<?php
$XML_Profiles = "";
$XML_Variables = "";
$host_attribs = array('name' => $host['Host']['name'], 'profile-id' => $host['MainProfile']['id_text']);

if (isset($host['Variable'])) {
	$variables = array();
	foreach ($host['Variable'] as $var)
		$variables[] = array('_name_' => 'variable', 'name' => $var['name'], 'value' => $var['value']);
	if (!empty($variables))
		$XML_Variables = $xml->serialize($variables);
}

if (isset($host['Profile'])) {
	$profiles = array();
	foreach ($host['Profile'] as $profile)
		$profiles[] = array('_name_' => 'profile', 'id' => $profile['id_text']);
	if (!empty($profiles))
		$XML_Profiles = $xml->serialize($profiles);
}
echo $xml->elem('host', $host_attribs, $XML_Variables . $XML_Profiles, true);
?>