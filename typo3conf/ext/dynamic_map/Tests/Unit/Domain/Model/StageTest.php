<?php
namespace NW\DynamicMap\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Moustafa Moustafa 
 */
class StageTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \NW\DynamicMap\Domain\Model\Stage
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \NW\DynamicMap\Domain\Model\Stage();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );

    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );

    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getWidthReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWidth()
        );

    }

    /**
     * @test
     */
    public function setWidthForStringSetsWidth()
    {
        $this->subject->setWidth('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'width',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getHeightReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getHeight()
        );

    }

    /**
     * @test
     */
    public function setHeightForStringSetsHeight()
    {
        $this->subject->setHeight('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'height',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getItemReturnsInitialValueForItem()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getItem()
        );

    }

    /**
     * @test
     */
    public function setItemForObjectStorageContainingItemSetsItem()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();
        $objectStorageHoldingExactlyOneItem = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneItem->attach($item);
        $this->subject->setItem($objectStorageHoldingExactlyOneItem);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneItem,
            'item',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addItemToObjectStorageHoldingItem()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();
        $itemObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($item));
        $this->inject($this->subject, 'item', $itemObjectStorageMock);

        $this->subject->addItem($item);
    }

    /**
     * @test
     */
    public function removeItemFromObjectStorageHoldingItem()
    {
        $item = new \NW\DynamicMap\Domain\Model\Item();
        $itemObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $itemObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($item));
        $this->inject($this->subject, 'item', $itemObjectStorageMock);

        $this->subject->removeItem($item);

    }
}
