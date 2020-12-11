<?php
namespace GuzzleHttpFork\Test\Handler;

use GuzzleHttpFork\Handler\EasyHandle;
use GuzzleHttpFork\Psr7;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GuzzleHttpFork\Handler\EasyHandle
 */
class EasyHandleTest extends TestCase
{
    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage The EasyHandle has been released
     */
    public function testEnsuresHandleExists()
    {
        $easy = new EasyHandle;
        unset($easy->handle);
        $easy->handle;
    }
}
