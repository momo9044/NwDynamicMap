<?php
namespace NW\DynamicMap\Domain\Repository;

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
 * The repository for Items
 */
class ItemRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );
    public function findByStage($stage)
    {
        $query = $this->createQuery();
        $sql = "SELECT * FROM tx_dynamicmap_domain_model_item WHERE stage = $stage AND deleted= 0 ORDER BY number ASC ";
        $query->statement($sql);
        $res = $query->execute($sql);
        return $res;
    }
}
