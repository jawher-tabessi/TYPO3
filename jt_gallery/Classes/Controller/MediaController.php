<?php
namespace JT\JtGallery\Controller;

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
 * MediaController
 */
class MediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * mediaRepository
     *
     * @var \JT\JtGallery\Domain\Repository\MediaRepository
     * @inject
     */
    protected $mediaRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        /* GET STORAGE FOLDER FROM FLEXFORM SETTINGS */
        $storageFolder = $this->settings['storage_folder'];
        /* GET ALL MEDIAS NOT HIDDEN, NOT DELETED, OF THE CURRENT LANGUAGE AND IN THE SELECTED STORAGE FOLDER */
        $medias = $this->mediaRepository->findAllRecordsInStorage($storageFolder);
        /* SEND RETRIEVED MEDIAS TO VIEW */
        $this->view->assign('medias', $medias);
    }
}
