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
 * ItemController
 */
class ItemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * itemRepository
     *
     * @var \NW\DynamicMap\Domain\Repository\ItemRepository
     * @inject
     */
    protected $itemRepository = null;
    /**
     * stageRepository
     *
     * @var \NW\DynamicMap\Domain\Repository\StageRepository
     * @inject
     */
    protected $stageRepository = null;

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
            $pageRenderer->addCssFile('//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css', $rel = 'stylesheet', $media = 'all', $title = '', $compress = false, $forceOnTop = false, $allWrap = '', $excludeFromConcatenation = true, $splitChar = '|');
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
        $items = $this->itemRepository->findAll();
        $this->view->assign('items', $items);
    }

    /**
     * action show
     *
     * @param \NW\DynamicMap\Domain\Model\Item $item
     * @return void
     */
    public function showAction(\NW\DynamicMap\Domain\Model\Item $item)
    {
        $this->view->assign('item', $item);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $args = $this->request->getArguments();
        if ($args['stage'] !== "") {
            $this->view->assign('getStage', (int)$args['stage']);
        }
        $stages = $this->stageRepository->findAll();
        $this->view->assign('stages', $stages);
    }

    /**
     * action create
     *
     * @param \NW\DynamicMap\Domain\Model\Item $newItem
     * @return void
     */
    public function createAction(\NW\DynamicMap\Domain\Model\Item $newItem)
    {
        $this->addFlashMessage('Der Eintrag wurde erstellt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->itemRepository->add($newItem);
        $this->persistenceManager->persistAll();
        $fileUploader = new FileUpload();
        $uploadedFiles = $_FILES['tx_dynamicmap_web_dynamicmappi2'];
        if ($uploadedFiles['name']['image'])
            $fileUploader->uploadAndCreateFileReference('image', $uploadedFiles, $newItem, 'image', 'tx_dynamicmap_domain_model_stage');
        $this->redirect('show', 'Stage', 'dynamicmap', array('stage' => $newItem->getStage()));
    }

    /**
     * action edit
     *
     * @param \NW\DynamicMap\Domain\Model\Item $item
     * @ignorevalidation $item
     * @return void
     */
    public function editAction(\NW\DynamicMap\Domain\Model\Item $item)
    {
        $stages = $this->stageRepository->findAll();
        $this->view->assign('stages', $stages);

        $stage = $this->stageRepository->findByUid($item->getStage());
        $this->view->assign('STAGE', $stage);
        $this->view->assign('item', $item);
    }

    /**
     * action update
     *
     * @param \NW\DynamicMap\Domain\Model\Item $item
     * @return void
     */
    public function updateAction(\NW\DynamicMap\Domain\Model\Item $item)
    {
        $this->addFlashMessage('Der Eintrag wurde aktualisiert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->itemRepository->update($item);
        $this->persistenceManager->persistAll();
        $this->redirect('show', 'Stage', 'dynamicmap', array('stage' => $item->getStage()));
    }

    /**
     * action delete
     *
     * @param \NW\DynamicMap\Domain\Model\Item $item
     * @return void
     */
    public function deleteAction(\NW\DynamicMap\Domain\Model\Item $item)
    {
        $this->addFlashMessage('Der Eintrag wurde gelöscht!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);

        $stageUid = $item->getStage();
        $this->itemRepository->remove($item);
        $this->persistenceManager->persistAll();
        $this->redirect('show', 'Stage', 'dynamicmap', array('stage' => $stageUid));

    }
}
