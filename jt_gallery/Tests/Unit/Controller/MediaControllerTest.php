<?php
namespace JT\JtGallery\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Jawher Tabessi <tabessijawher@gmail.com>
 */
class MediaControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \JT\JtGallery\Controller\MediaController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\JT\JtGallery\Controller\MediaController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllMediasFromRepositoryAndAssignsThemToView()
    {

        $allMedias = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mediaRepository = $this->getMockBuilder(\JT\JtGallery\Domain\Repository\MediaRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $mediaRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMedias));
        $this->inject($this->subject, 'mediaRepository', $mediaRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('medias', $allMedias);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
