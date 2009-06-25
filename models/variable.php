<?php
require_once('../util.functions.php');
class Variable extends AppModel {

	var $name = 'Variable';
	var $validate = array(
		'ref_type' => array(
			'rule' => 'checkRange',
			'message' => 'Invalid variable type.'
		),
		'ref_id' => array(
			'rule' => 'refExists',
			'message' => 'Invalid variable reference ID.'
		)
	);

	function checkRange($data) {
		$field = array_shift(array_keys($data));
		return in_array($data[$field], constsVals('VARIABLE_TYPE_'));
	}
	
	function refExists($data) {
		$field = array_shift(array_keys($data));
		$typeName = constValToLCSingle('VARIABLE_TYPE_', $this->data['Variable']['ref_type'], false, false, false);
		return ($typeName != null && ClassRegistry::init(ucwords($typeName))->find('count', array('conditions' => array(ucwords($typeName) . '.id' => $data[$field]))) > 0);
	}

	function getAllFor($type, $recordId) {
		$type = constant('VARIABLE_TYPE_' . strtoupper($type));
		if ($type === null)
			return false;
		else
			return $this->find('all', array('conditions' => array('Variable.ref_type' => $type, 'Variable.ref_id' => $recordId),
											'fields' => array('Variable.id', 'Variable.name', 'Variable.value')
			));
	}
}
?>