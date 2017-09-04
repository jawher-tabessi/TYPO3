<?php
namespace JT\JtGallery\Domain\Repository;

/***
 *
 * This file is part of the "JT Image &amp; Video Gallery" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Jawher Tabessi <tabessijawher@gmail.com>
 *
 ***/

/**
 * The repository for Medias
 */
class MediaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];
    
    /**
     * 
     * @param type $pid
     * @return type
     */
    public function findAllRecordsInStorage($storage) {

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
        /* GET ALL MEDIAS NOT HIDDEN, NOT DELETED, OF THE CURRENT LANGUAGE AND IN THE SELECTED STORAGE FOLDER */
        $query->matching(
                $query->logicalAnd(
                        $query->equals('sys_language_uid', $GLOBALS['TSFE']->sys_language_uid),
                        $query->equals('pid',$storage),
                        $query->equals('deleted', '0'),
                        $query->equals('hidden', '0')
                )
        );

        return $query->execute();
    }
}
