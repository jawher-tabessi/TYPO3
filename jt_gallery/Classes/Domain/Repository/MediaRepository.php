<?php
namespace JT\JtGallery\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Jawher Tabessi <tabessijawher@gmail.com>, Open vision
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * The repository for Medias
 */
class MediaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
     * 
     * @param type $pid
     * @return type
     */
    public function findAllRecordsInStorage($storage) {

		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		// GET ALL MEDIAS NOT HIDDEN, NOT DELETED, OF THE CURRENT LUANGUAGE AND IN THE STORAGE FOLDER RETRIEVED FROM FLEXFORM SETTINGS
		$query->matching(
			$query->logicalAnd(
				$query->equals('sys_language_uid', $GLOBALS['TSFE']->config['config']['sys_language_uid']),
				$query->equals('pid',$storage),
				$query->equals('deleted', '0'),
				$query->equals('hidden', '0')
			)
		);
		
		return $query->execute();
    }
	
	/**
     * 
     * @param type $pid
     * @return type
     */
    public function findAllRecordsBe() {

		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		// GET ALL MEDIAS NOT DELETED
		$query->matching(
			$query->logicalAnd(
				$query->equals('deleted', '0')
			)
		);
		
		return $query->execute();
    }

	
}