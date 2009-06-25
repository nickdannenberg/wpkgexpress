<?php if (!$packageChecks || count($packageChecks) == 0): ?>
	&lt;None&gt;
<?php else: ?>
	<?php echo $tree->generate($packageChecks, array('model' => 'PackageCheck', 'element' => 'packagecheck')); ?>
<?php endif; ?>