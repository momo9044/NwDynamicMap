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
 * Stage
 */
class Stage extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */

    protected $name = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * width
     *
     * @var string
     */
    protected $width = '';

    /**
     * height
     *
     * @var string
     */
    protected $height = '';



    /**
     * item
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NW\DynamicMap\Domain\Model\Item>
     * @cascade remove
     */
    protected $item = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->item = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the width
     *
     * @return string $width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets the width
     *
     * @param string $width
     * @return void
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }




    /**
     * Returns the height
     *
     * @return string $height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the height
     *
     * @param string $height
     * @return void
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Adds a Item
     *
     * @param \NW\DynamicMap\Domain\Model\Item $item
     * @return void
     */
    public function addItem(\NW\DynamicMap\Domain\Model\Item $item)
    {
        $this->item->attach($item);
    }

    /**
     * Removes a Item
     *
     * @param \NW\DynamicMap\Domain\Model\Item $itemToRemove The Item to be removed
     * @return void
     */
    public function removeItem(\NW\DynamicMap\Domain\Model\Item $itemToRemove)
    {
        $this->item->detach($itemToRemove);
    }

    /**
     * Returns the item
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NW\DynamicMap\Domain\Model\Item> $item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Sets the item
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NW\DynamicMap\Domain\Model\Item> $item
     * @return void
     */
    public function setItem(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $item)
    {
        $this->item = $item;
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
}
