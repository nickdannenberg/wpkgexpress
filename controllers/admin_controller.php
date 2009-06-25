<?php
include_once('../import.functions.php');
include_once('../wpkg_constants.php');

class AdminController extends AppController {
	var $name = 'Admin';
	var $layout = 'main';
	var $uses = array();
	var $components = array('Session', 'RequestHandler', 'Configuration');
	var $helpers = array('Html', 'Form', 'Navigate', 'Javascript');

	function index() {
		if (!empty($this->data)) {
			$msg = '';
			$files = array('packages' => XSD_PATH_PACKAGES, 'profiles' => XSD_PATH_PROFILES, 'hosts' => XSD_PATH_HOSTS);
			if (isset($this->data['Import'])) {
				while (current($files) !== false) {
					$type = key($files);
					$xsdFileName = current($files);
					$xmlFileName = $this->data['Import'][$type]['tmp_name'];
					if ($this->isUploadedFile($this->data['Import'][$type]) === true) {
						$result = WPKGImporter::getInstance()->validateXML($xmlFileName, $xsdFileName);
						if ($result === true) {
							// XSD Validation passed, so go ahead and import
							$result = WPKGImporter::getInstance()->{'import' . ucwords($type)}($xmlFileName);
							$msg .= $this->element('importResults', array('data' => $result, 'type' => strtolower($type)));
						} else
							$msg .= $this->element('importValidateMessages', array('data' => $result, 'type' => strtolower($type)));
					}
					next($files);
				}
			} else if (isset($this->data['XMLFeed'])) {
				$installer =& ClassRegistry::init('Installer');
				$validation = $installer->validate[1];
				$installer->validate = array_slice($validation, -3, null, true);
				
				// Let the user leave the password field blank if they do not wish to change the existing password
				if (empty($this->data['XMLFeed']['xmlpassword']))
					unset($installer->validate['xmlpassword']);
				
				$installer->data = array('Installer' => $this->data['XMLFeed']);
				if ($installer->validates()) {
					$settings = array_keys($installer->validate);
					foreach ($settings as $name) {
						if ($name == 'xmlpassword')
	 						$data = $this->__hashPwd($this->data['XMLFeed'][$name]);
						else if ($name == 'protectxml')
							$this->data['XMLFeed'][$name] = $data = (int)$this->data['XMLFeed'][$name];
						else
							$data = $this->data['XMLFeed'][$name];
						$this->Configuration->write("Auth.$name", $data);
					}
					$this->Configuration->save();
					$msg = "XML Feed Access settings saved";
				} else
					$xmlFeedAccessErrs = $installer->validationErrors;
			}
			$this->Session->setFlash((empty($msg) ? 'An error occurred while processing your input' : $msg));
		}

		$installer =& ClassRegistry::init('Installer');
		$validation = $installer->validate[1];
		$installer->validate = array_slice($validation, -3, null, true);
		$settings = array_keys($installer->validate);
		foreach ($settings as $name)
			if ($name != 'xmlpassword')
				$this->data['XMLFeed'][$name] = $this->Configuration->read("Auth.$name");
					
		if (!isset($xmlFeedAccessErrs))
			$xmlFeedAccessErrs = array();
		$this->set(compact('xmlFeedAccessErrs'));
	}

}
?>