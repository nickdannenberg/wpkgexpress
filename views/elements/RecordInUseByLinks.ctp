<?php
if (!isset($records))
	exit();
if (!isset($field) || empty($field))
	$field = 'id_text';
$model = array_keys($records[0]);
$model = $model[0];

foreach ($records as $record)
	$links[] = $html->link($record[$model][$field], array('controller' => Inflector::pluralize(strtolower($model)), 'action'=>'view', $record[$model]['id']));
echo implode(", ", $links);
?>