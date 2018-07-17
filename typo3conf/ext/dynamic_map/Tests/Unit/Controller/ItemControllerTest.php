<?php
namespace NW\DynamicMap\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Moustafa Moustafa 
 */
class ItemControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \NW\DynamicMap\Controller\ItemController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\NW\DynamicMap\Controller\ItemController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllItemsFromRepositoryAndAssignsThemToView()
    {

        $allItems = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\ItemRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $itemRepository->expects(self::once())->method('findAll')->will(self::returnValue($allItems));
        $this->inject($this->subject, 'itemRepository', $itemRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('items', $allItems);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenItemToView()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('item', $item);

        $this->subject->showAction($item);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenItemToItemRepository()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();

        $itemRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\ItemRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository->expects(self::once())->method('add')->with($item);
        $this->inject($this->subject, 'itemRepository', $itemRepository);

        $this->subject->createAction($item);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenItemToView()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('item', $item);

        $this->subject->editAction($item);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenItemInItemRepository()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();

        $itemRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\ItemRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository->expects(self::once())->method('update')->with($item);
        $this->inject($this->subject, 'itemRepository', $itemRepository);

        $this->subject->updateAction($item);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenItemFromItemRepository()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();

        $itemRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\ItemRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository->expects(self::once())->method('remove')->with($item);
        $this->inject($this->subject, 'itemRepository', $itemRepository);

        $this->subject->deleteAction($item);
    }
}
