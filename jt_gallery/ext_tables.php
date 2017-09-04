<?php
defined('TYPO3_MODE') || die('Access denied.');

$pluginNames = [
    'Pi1',
];

foreach ($pluginNames as $pluginName) {
    $pluginSignature = strtolower(str_replace('_', '', $_EXTKEY)) . '_' . strtolower($pluginName);
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'JT.' . $_EXTKEY,
        $pluginName,
        'JT Image & Video Gallery'
    );
    $TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,select_key,pages';

    $flexFormPath = 'EXT:' . $_EXTKEY . '/Configuration/FlexForms/' . $pluginName . 'Plugin.xml';
    if (file_exists(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($flexFormPath))) {
        $TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            $pluginSignature,
            'FILE:' . $flexFormPath
        );
    }
}

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jt_gallery', 'Configuration/TypoScript', 'JT Image & Video Gallery');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jtgallery_domain_model_media', 'EXT:jt_gallery/Resources/Private/Language/locallang_csh_tx_jtgallery_domain_model_media.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jtgallery_domain_model_media');

    }
);
