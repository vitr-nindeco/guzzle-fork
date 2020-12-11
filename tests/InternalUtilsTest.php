<?php
namespace GuzzleHttpFork\Test;

use GuzzleHttpFork\Psr7;
use GuzzleHttpFork\Utils;
use PHPUnit\Framework\TestCase;

class InternalUtilsTest extends TestCase
{
    public function testCurrentTime()
    {
        self::assertGreaterThan(0, Utils::currentTime());
    }

    public function testIdnConvert()
    {
        $uri = Psr7\uri_for('https://яндекс.рф/images');
        $uri = Utils::idnUriConvert($uri);
        self::assertSame('xn--d1acpjx3f.xn--p1ai', $uri->getHost());
    }
}
