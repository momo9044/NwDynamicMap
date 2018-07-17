<?php
namespace NW\DynamicMap\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Moustafa Moustafa 
 */
class ItemTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \NW\DynamicMap\Domain\Model\Item
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \NW\DynamicMap\Domain\Model\Item();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNumberReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setNumberForIntSetsNumber()
    {
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
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
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
    public function getLinkReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLink()
        );

    }

    /**
     * @test
     */
    public function setLinkForStringSetsLink()
    {
        $this->subject->setLink('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'link',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPositionXReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPositionX()
        );

    }

    /**
     * @test
     */
    public function setPositionXForFloatSetsPositionX()
    {
        $this->subject->setPositionX(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'positionX',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getPositionYReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPositionY()
        );

    }

    /**
     * @test
     */
    public function setPositionYForFloatSetsPositionY()
    {
        $this->subject->setPositionY(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'positionY',
            $this->subject,
            '',
            0.000000001
        );

    }
}
