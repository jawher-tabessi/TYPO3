<?php

namespace JT\JtGallery\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Jawher Tabessi <tabessijawher@gmail.com>, Open vision
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \JT\JtGallery\Domain\Model\Media.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jawher Tabessi <tabessijawher@gmail.com>
 */
class MediaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \JT\JtGallery\Domain\Model\Media
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \JT\JtGallery\Domain\Model\Media();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getType()
		);
	}

	/**
	 * @test
	 */
	public function setTypeForIntegerSetsType() {
		$this->subject->setType(12);

		$this->assertAttributeEquals(
			12,
			'type',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getThumbnailReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getThumbnail()
		);
	}

	/**
	 * @test
	 */
	public function setThumbnailForFileReferenceSetsThumbnail() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setThumbnail($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'thumbnail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFileReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getFile()
		);
	}

	/**
	 * @test
	 */
	public function setFileForFileReferenceSetsFile() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setFile($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'file',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUrlReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getUrl()
		);
	}

	/**
	 * @test
	 */
	public function setUrlForStringSetsUrl() {
		$this->subject->setUrl('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'url',
			$this->subject
		);
	}
}
