<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'JT.JtGallery',
            'Pi1',
            [
                'Media' => 'list'
            ],
            // non-cacheable actions
            [
                'Media' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('jt_gallery') . 'Resources/Public/Icons/user_plugin_pi1.svg
                        title = LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jt_gallery_domain_model_pi1
                        description = LLL:EXT:jt_gallery/Resources/Private/Language/locallang_db.xlf:tx_jt_gallery_domain_model_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = jtgallery_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
