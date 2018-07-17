<?php
$pluginSingnature = 'dynamicmap_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSingnature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSingnature,
    'FILE:EXT:dynamic_map/Configuration/FlexForms/DynamicMap.xml'
);