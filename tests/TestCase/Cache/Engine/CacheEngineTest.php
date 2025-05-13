<?php
declare(strict_types=1);

namespace Cake\Test\TestCase\Cache\Engine;

use Cake\TestSuite\TestCase;
use DateInterval;
use PHPUnit\Framework\Attributes\TestWith;
use TestApp\Cache\Engine\TestAppCacheEngine;

class CacheEngineTest extends TestCase
{
    /**
     * Test duration with null, int and DateInterval multiple format.
     */
    #[TestWith([null, 10])]
    #[TestWith([2, 2])]
    #[TestWith([new DateInterval('PT1S'), 1])]
    #[TestWith([new DateInterval('P1D'), 86400])]
    public function testDuration($ttl, $expected): void
    {
        $engine = new TestAppCacheEngine();
        $engine->setConfig(['duration' => 10]);

        $result = $engine->getDuration($ttl);

        $this->assertSame($result, $expected);
    }
}
