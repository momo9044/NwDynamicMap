<?php
namespace NW\DynamicMap\ViewHelpers;

class AddPublicResourcesViewHelper extends  \TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper {

    public function render() {
        $doc = $this->getDocInstance();
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath("ext_key");



        $pageRenderer->loadJquery();
        $pageRenderer->addJsFile($extRelPath . "Resources/Public/js/app.js");

        $output = $this->renderChildren();
        $output = $doc->startPage("title") . $output;
        $output .= $doc->endPage();

        return $output;
    }
}