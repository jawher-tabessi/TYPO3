<?php
namespace JT\JtGallery\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Jawher Tabessi <tabessijawher@gmail.com>
 */
class MediaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \JT\JtGallery\Domain\Model\Media
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \JT\JtGallery\Domain\Model\Media();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
    public function getMediaTypeReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setMediaTypeForIntSetsMediaType()
    {
    }

    /**
     * @test
     */
    public function getThumbnailReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getThumbnail()
        );
    }

    /**
     * @test
     */
    public function setThumbnailForFileReferenceSetsThumbnail()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setThumbnail($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'thumbnail',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMediaFileReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getMediaFile()
        );
    }

    /**
     * @test
     */
    public function setMediaFileForFileReferenceSetsMediaFile()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMediaFile($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'mediaFile',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUrlReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getUrl()
        );
    }

    /**
     * @test
     */
    public function setUrlForStringSetsUrl()
    {
        $this->subject->setUrl('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'url',
            $this->subject
        );
    }
}
