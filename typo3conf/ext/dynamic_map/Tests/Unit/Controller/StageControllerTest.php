<?php
namespace NW\DynamicMap\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Moustafa Moustafa 
 */
class StageControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \NW\DynamicMap\Controller\StageController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\NW\DynamicMap\Controller\StageController::class)
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
    public function listActionFetchesAllStagesFromRepositoryAndAssignsThemToView()
    {

        $allStages = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stageRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\StageRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $stageRepository->expects(self::once())->method('findAll')->will(self::returnValue($allStages));
        $this->inject($this->subject, 'stageRepository', $stageRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('stages', $allStages);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenStageToView()
    {
        $stage = new \NW\DynamicMap\Domain\Model\Stage();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('stage', $stage);

        $this->subject->showAction($stage);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenStageToStageRepository()
    {
        $stage = new \NW\DynamicMap\Domain\Model\Stage();

        $stageRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\StageRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $stageRepository->expects(self::once())->method('add')->with($stage);
        $this->inject($this->subject, 'stageRepository', $stageRepository);

        $this->subject->createAction($stage);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenStageToView()
    {
        $stage = new \NW\DynamicMap\Domain\Model\Stage();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('stage', $stage);

        $this->subject->editAction($stage);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenStageInStageRepository()
    {
        $stage = new \NW\DynamicMap\Domain\Model\Stage();

        $stageRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\StageRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $stageRepository->expects(self::once())->method('update')->with($stage);
        $this->inject($this->subject, 'stageRepository', $stageRepository);

        $this->subject->updateAction($stage);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenStageFromStageRepository()
    {
        $stage = new \NW\DynamicMap\Domain\Model\Stage();

        $stageRepository = $this->getMockBuilder(\NW\DynamicMap\Domain\Repository\StageRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $stageRepository->expects(self::once())->method('remove')->with($stage);
        $this->inject($this->subject, 'stageRepository', $stageRepository);

        $this->subject->deleteAction($stage);
    }
}
