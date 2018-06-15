<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'CGB.' . $_EXTKEY,
	'Simulate',
	array(
		'User' => 'list, switch, logout',
		
	),
	// non-cacheable actions
	array(
		'User' => 'list, switch, logout',
		
	)
);
