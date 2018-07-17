<?php
namespace NW\DynamicMap\Domain\Model;

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
 * Item
 */
class Item extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * number
     *
     * @var int
     */
    protected $number = 0;

    /**
     * stage
     *
     * @var int
     */
    protected $stage = 0;


    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * circleBgColor
     *
     * @var string
     */
    protected $circleBgColor = '';
    /**
     * circleBorderColor
     *
     * @var string
     */
    protected $circleBorderColor = '';

    /**
     * @return string
     */
    public function getCircleBgColor(): string
    {
        return $this->circleBgColor;
    }

    /**
     * @param string $circleBgColor
     */
    public function setCircleBgColor(string $circleBgColor): void
    {
        $this->circleBgColor = $circleBgColor;
    }

    /**
     * @return string
     */
    public function getCircleBorderColor(): string
    {
        return $this->circleBorderColor;
    }

    /**
     * @param string $circleBorderColor
     */
    public function setCircleBorderColor(string $circleBorderColor): void
    {
        $this->circleBorderColor = $circleBorderColor;
    }

    /**
     * @return bool
     */
    public function getShowInFe(): bool
    {
        return $this->showInFe;
    }

    /**
     * @param bool $showInFe
     */
    public function setShowInFe(bool $showInFe): void
    {
        $this->showInFe = $showInFe;
    }

    /**
     * showInFe
     *
     * @var bool
     */
    protected $showInFe = 0;
    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * link
     *
     * @var string
     */
    protected $link = '';

    /**
     * positionX
     *
     * @var float
     */
    protected $positionX = 0.0;

    /**
     * positionY
     *
     * @var float
     */
    protected $positionY = 0.0;

    /**
     * Returns the number
     *
     * @return int $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the number
     *
     * @param int $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }


    /**
     * Returns the stage
     *
     * @return int $stage
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Sets the stage
     *
     * @param int $stage
     * @return void
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
    }


    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the positionX
     *
     * @return float $positionX
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * Sets the positionX
     *
     * @param float $positionX
     * @return void
     */
    public function setPositionX($positionX)
    {
        $this->positionX = $positionX;
    }

    /**
     * Returns the positionY
     *
     * @return float $positionY
     */
    public function getPositionY()
    {
        return $this->positionY;
    }

    /**
     * Sets the positionY
     *
     * @param float $positionY
     * @return void
     */
    public function setPositionY($positionY)
    {
        $this->positionY = $positionY;
    }

    /**
     * Returns the link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
}
