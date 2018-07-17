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
 * The repository for Stages
 */
class StageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    public function findLastInsertedId()
    {
        $query = $this->createQuery();
        $sql = "SELECT uid, pid FROM tx_dynamicmap_domain_model_stage ORDER BY uid DESC LIMIT 1";
        $query->statement($sql);
        $res = $query->execute($sql);
        return $res;
    }
}
