<profiles>
<?php
foreach ($profiles as $profile) {
	$XML_Depends = "";
	$XML_Packages = "";
	$XML_Variables = "";
	$profile_attribs = array('id'=>$profile['Profile']['id_text']);

	if  (isset($profile['Package'])) {
		$packages = array();
		foreach ($profile['Package'] as $package)
			$packages[] = array('_name_' => 'package', 'package-id' => $package['id_text']);
		if (!empty($packages))
			$XML_Packages = $xml->serialize($packages);
	}

	if  (isset($profile['ProfileDependency'])) {
		$depends = array();
		foreach ($profile['ProfileDependency'] as $depend)
			$depends[] = array('_name_' => 'depends', 'profile-id' => $depend['id_text']);
		if (!empty($depends))
			$XML_Depends = $xml->serialize($depends);
	}

	if (isset($profile['Variable'])) {
		$variables = array();
		foreach ($profile['Variable'] as $var)
			$variables[] = array('_name_' => 'variable', 'name' => $var['name'], 'value' => $var['value']);
		if (!empty($variables))
			$XML_Variables = $xml->serialize($variables);
	}
	echo $xml->elem('profile', $profile_attribs, $XML_Variables . $XML_Depends . $XML_Packages, true);
}
?>
</profiles>