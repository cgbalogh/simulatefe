<?php
namespace CGB\Simulatefe\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Kai Strobach <typo3@kay-strobach.de>
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class UserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Simulatefe\Domain\Model\User
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Simulatefe\Domain\Model\User();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
