<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JT.' . $_EXTKEY,
	'Pi1',
	array(
		'Media' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Media' => 'create, update, delete',
		
	)
);
