<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jtgallery_domain_model_media'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jtgallery_domain_model_media']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, type, description, thumbnail, file, url',
	),
	'types' => array(
		'0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, type, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, type, description, file, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
		'2' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, type, description, thumbnail, file, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
		'3' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, type, description, url, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_jtgallery_domain_model_media',
				'foreign_table_where' => 'AND tx_jtgallery_domain_model_media.pid=###CURRENT_PID### AND tx_jtgallery_domain_model_media.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jtgallery_domain_model_media.type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('-- Choose option --', 0),
					array('Image', 1),
					array('Video', 2),
					array('Youtube', 3),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jtgallery_domain_model_media.description',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'thumbnail' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jtgallery_domain_model_media.thumbnail',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'thumbnail',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'file' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jtgallery_domain_model_media.file',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'file',
				array('maxitems' => 1),
				'gif,png,jpg,jpeg,webm,mp4,ogv,wav,mp3'
			),
		),
		'url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jtgallery_domain_model_media.url',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		
	),
);
