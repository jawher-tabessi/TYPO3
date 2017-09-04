<?php
namespace JT\JtGallery\Domain\Model;

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
 * Media
 */
class Media extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * description
     *
     * @var string
     * @validate NotEmpty
     */
    protected $description = '';

    /**
     * mediaType
     *
     * @var int
     * @validate NotEmpty
     */
    protected $mediaType = 0;

    /**
     * thumbnail
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $thumbnail = null;

    /**
     * mediaFile
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $mediaFile = null;

    /**
     * url
     *
     * @var string
     */
    protected $url = '';

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
     * Returns the mediaType
     *
     * @return int $mediaType
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * Sets the mediaType
     *
     * @param int $mediaType
     * @return void
     */
    public function setMediaType($mediaType)
    {
        $this->mediaType = $mediaType;
    }

    /**
     * Returns the thumbnail
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Sets the thumbnail
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail
     * @return void
     */
    public function setThumbnail(\TYPO3\CMS\Extbase\Domain\Model\FileReference $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * Returns the mediaFile
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mediaFile
     */
    public function getMediaFile()
    {
        return $this->mediaFile;
    }

    /**
     * Sets the mediaFile
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mediaFile
     * @return void
     */
    public function setMediaFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mediaFile)
    {
        $this->mediaFile = $mediaFile;
    }

    /**
     * Returns the url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the url
     *
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
