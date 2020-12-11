<?php
namespace GuzzleHttpFork\Tests;

use GuzzleHttpFork\Psr7;
use GuzzleHttpFork\TransferStats;
use PHPUnit\Framework\TestCase;

class TransferStatsTest extends TestCase
{
    public function testHasData()
    {
        $request = new Psr7\Request('GET', 'http://foo.com');
        $response = new Psr7\Response();
        $stats = new TransferStats(
            $request,
            $response,
            10.5,
            null,
            ['foo' => 'bar']
        );
        self::assertSame($request, $stats->getRequest());
        self::assertSame($response, $stats->getResponse());
        self::assertTrue($stats->hasResponse());
        self::assertSame(['foo' => 'bar'], $stats->getHandlerStats());
        self::assertSame('bar', $stats->getHandlerStat('foo'));
        self::assertSame($request->getUri(), $stats->getEffectiveUri());
        self::assertEquals(10.5, $stats->getTransferTime());
        self::assertNull($stats->getHandlerErrorData());
    }
}
