<?php
namespace GuzzleHttpFork\Tests\Exception;

use GuzzleHttpFork\Exception\ConnectException;
use GuzzleHttpFork\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GuzzleHttpFork\Exception\ConnectException
 */
class ConnectExceptionTest extends TestCase
{
    public function testHasNoResponse()
    {
        $req = new Request('GET', '/');
        $prev = new \Exception();
        $e = new ConnectException('foo', $req, $prev, ['foo' => 'bar']);
        self::assertSame($req, $e->getRequest());
        self::assertNull($e->getResponse());
        self::assertFalse($e->hasResponse());
        self::assertSame('foo', $e->getMessage());
        self::assertSame('bar', $e->getHandlerContext()['foo']);
        self::assertSame($prev, $e->getPrevious());
    }
}
