<?php
namespace JT\JtGallery\Controller;


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
 * MediaController
 */
class MediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * mediaRepository
	 *
	 * @var \JT\JtGallery\Domain\Repository\MediaRepository
	 * @inject
	 */
	protected $mediaRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		// GET STORAGE FOLDER FROM FLEXFORM SETTINGS
		$storageFolder = $this->settings['storage_folder'];
		// GET ALL MEDIAS NOT HIDDEN, NOT DELETED, OF THE CURRENT LUANGUAGE AND IN THE STORAGE FOLDER RETRIEVED FROM FLEXFORM SETTINGS
		$medias = $this->mediaRepository->findAllRecordsInStorage($storageFolder);
		// SEND RETRIEVED MEDIAS TO VIEW
		$this->view->assign('medias', $medias);
		
	}
	
	/**
	 * action listBe
	 *
	 * @return void
	 */
	public function listBeAction() {
		
		// GET ALL MEDIAS NOT DELETED
		$medias = $this->mediaRepository->findAllRecordsBe();
		// SEND RETRIEVED MEDIAS TO VIEW
		$this->view->assign('medias', $medias);
		
	}

	/**
	 * action show
	 *
	 * @param \JT\JtGallery\Domain\Model\Media $media
	 * @return void
	 */
	public function showAction(\JT\JtGallery\Domain\Model\Media $media) {
		$this->view->assign('media', $media);
	}

	/**
	 * action new
	 *
	 * @param \JT\JtGallery\Domain\Model\Media $newMedia
	 * @ignorevalidation $newMedia
	 * @return void
	 */
	public function newAction(\JT\JtGallery\Domain\Model\Media $newMedia = NULL) {
		$this->view->assign('newMedia', $newMedia);
	}

	/**
	 * action create
	 *
	 * @param \JT\JtGallery\Domain\Model\Media $newMedia
	 * @return void
	 */
	public function createAction(\JT\JtGallery\Domain\Model\Media $newMedia) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->mediaRepository->add($newMedia);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \JT\JtGallery\Domain\Model\Media $media
	 * @ignorevalidation $media
	 * @return void
	 */
	public function editAction(\JT\JtGallery\Domain\Model\Media $media) {
		$this->view->assign('media', $media);
	}

	/**
	 * action update
	 *
	 * @param \JT\JtGallery\Domain\Model\Media $media
	 * @return void
	 */
	public function updateAction(\JT\JtGallery\Domain\Model\Media $media) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->mediaRepository->update($media);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \JT\JtGallery\Domain\Model\Media $media
	 * @return void
	 */
	public function deleteAction(\JT\JtGallery\Domain\Model\Media $media) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->mediaRepository->remove($media);
		$this->redirect('list');
	}

}