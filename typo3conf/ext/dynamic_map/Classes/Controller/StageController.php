<?php

namespace NW\DynamicMap\Controller;

/***
 *
 * This file is part of the "Dynamic Map" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Moustafa Moustafa
 *
 ***/

/**
 * StageController
 */
class StageController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * stageRepository
     *
     * @var \NW\DynamicMap\Domain\Repository\StageRepository
     * @inject
     */
    protected $stageRepository = null;

    /**
     * itemRepository
     *
     * @var \NW\DynamicMap\Domain\Repository\ItemRepository
     * @inject
     */
    protected $itemRepository = null;
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    public function __construct()
    {
        $this->initializePageHeader();
    }

    private function initializePageHeader()
    {
        if ($GLOBALS['BE_USER']->user['uid'] > 0) {
            $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
            $pageRenderer->addCssFile('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css', $rel = 'stylesheet', $media = 'all', $title = '', $compress = false, $forceOnTop = false, $allWrap = '', $excludeFromConcatenation = true, $splitChar = '|');

            $pageRenderer->addCssFile('../typo3conf/ext/dynamic_map/Resources/Public/CSS/dynamic_map.css', $rel = 'stylesheet', $media = 'all', $title = '', $compress = true, $forceOnTop = false, $allWrap = '', $excludeFromConcatenation = false, $splitChar = '|');
            $pageRenderer->addJsFile('../typo3conf/ext/dynamic_map/Resources/Public/JavaScript/jscolor.js', 'text/javascript', true, false, '', false, '|', false, '');

            $pageRenderer->addJsFile('../typo3conf/ext/dynamic_map/Resources/Public/JavaScript/Map3.js', 'text/javascript', true, false, '', false, '|', false, '');
            $pageRenderer->loadRequireJsModule('TYPO3/CMS/DynamicMap/jquery-ui.min', 'function() { TYPO3.jQuery(fan()); }');
            //$pageRenderer->loadRequireJsModule('TYPO3/CMS/<extname>/<select2-filename>','function() { TYPO3.jQuery.<postLoadFunctionName>(); }');

        }
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $stages = $this->stageRepository->findAll();
        $this->view->assign('stages', $stages);
    }

    /**
     * action show
     *
     * @param \NW\DynamicMap\Domain\Model\Stage $stage
     * @return void
     */
    public function showAction(\NW\DynamicMap\Domain\Model\Stage $stage)
    {
        $items = $this->itemRepository->findByStage($stage->getUid());
        $this->view->assign('items', $items);
        $this->view->assign('stage', $stage);
    }


    /**
     * action showStage
     *
     *
     * @return void
     */
    public function showStageAction()
    {

        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addJsFile('../typo3conf/ext/dynamic_map/Resources/Public/JavaScript/lightbox-content.js', 'text/javascript');



        $stageUid = $this->settings['stage'];
        $stage = $this->stageRepository->findByUid($stageUid);
        $items = $this->itemRepository->findByStage($stageUid);
        $this->view->assign('items', $items);
        $this->view->assign('stage', $stage);
    }


    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \NW\DynamicMap\Domain\Model\Stage $newStage
     * @return void
     */
    public function createAction(\NW\DynamicMap\Domain\Model\Stage $newStage)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->stageRepository->add($newStage);
        $this->persistenceManager->persistAll();

        $fileUploader = new FileUpload();
        $uploadedFiles = $_FILES['tx_dynamicmap_web_dynamicmappi2'];

        if ($uploadedFiles['name']['image'])
            $fileUploader->uploadAndCreateFileReference('image', $uploadedFiles, $newStage, 'image', 'tx_dynamicmap_domain_model_stage');
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \NW\DynamicMap\Domain\Model\Stage $stage
     * @ignorevalidation $stage
     * @return void
     */
    public function editAction(\NW\DynamicMap\Domain\Model\Stage $stage)
    {
        $this->view->assign('stage', $stage);
    }

    /**
     * action update
     *
     * @param \NW\DynamicMap\Domain\Model\Stage $stage
     * @return void
     */
    public function updateAction(\NW\DynamicMap\Domain\Model\Stage $stage)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->stageRepository->update($stage);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \NW\DynamicMap\Domain\Model\Stage $stage
     * @return void
     */
    public function deleteAction(\NW\DynamicMap\Domain\Model\Stage $stage)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->stageRepository->remove($stage);
        $this->redirect('list');
    }
}
