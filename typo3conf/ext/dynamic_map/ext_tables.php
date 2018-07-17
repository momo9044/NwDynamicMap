<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'NW.DynamicMap',
            'Pi1',
            'Dynamic Map'
        );

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'NW.DynamicMap',
                'web', // Make module a submodule of 'web'
                'pi2', // Submodule key
                '', // Position
                [
                    'Stage' => 'list, show, new, create, edit, update, delete','Item' => 'list, show, new, create, edit, update, delete',
                ],
                [
                    'access' => 'user,group',
					'icon'   => 'EXT:' . $extKey . '/Resources/Public/Icons/user_mod_pi2.png',
                    'labels' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_pi2.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Dynamic Map');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dynamicmap_domain_model_stage', 'EXT:dynamic_map/Resources/Private/Language/locallang_csh_tx_dynamicmap_domain_model_stage.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dynamicmap_domain_model_stage');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_dynamicmap_domain_model_item', 'EXT:dynamic_map/Resources/Private/Language/locallang_csh_tx_dynamicmap_domain_model_item.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_dynamicmap_domain_model_item');

    },
    $_EXTKEY
);
