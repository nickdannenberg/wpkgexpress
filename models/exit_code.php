<?php
include_once('../util.functions.php');

class ExitCode extends AppModel {

	var $name = 'ExitCode';
	var $validate = array(
		'code' => array(
			'isinteger' => array(
				'rule' => array('int_ok'),
				'message' => "The exit code's code attribute is invalid.",
				'last' => true
			),
			'isunique' => array(
				'rule' => array('isUniqueCode'),
				'on' => 'create',
				'message' => "The exit code's code already exists for this package action.",
				'last' => true
			)
		),
		'reboot' => array(
			'isinteger' => array(
				'rule' => array('int_ok'),
				'message' => "The exit code's reboot attribute is invalid.",
				'last' => true
			),
			'validrange' => array(
				'rule' => array('checkRange'),
				'message' => "The exit code's reboot attribute is invalid.",
				'last' => true
			)
		)
	);

	function isUniqueCode($data) {
		$conditions = array('ExitCode.id' => $this->id, 'ExitCode.code' => array_shift($data));
		return ($this->find('count', array('conditions' => $conditions, 'recursive' => -1)) == 0);
	}

	function checkRange($data) {
		$field = array_shift(array_keys($data));
		return in_array($data[$field], constsVals('EXITCODE_' . strtoupper($field) . '_'));
	}

	function int_ok($data) {
		$data = array_shift($data);
		return ($data !== true) && ((string)(int) $data) === ((string) $data);
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'PackageAction' => array('className' => 'PackageAction',
								'foreignKey' => 'package_action_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	function get($id) {
		$this->belongsTo['PackageAction']['fields'] = array('PackageAction.type', 'PackageAction.command');
		return $this->read(null, $id);
	}
	
	function getAllForAction($pkgActId) {
		return $this->find('all', array('conditions' => array('package_action_id' => $pkgActId), 'fields' => array('ExitCode.id', 'ExitCode.reboot', 'ExitCode.code')));
	}

}
?>