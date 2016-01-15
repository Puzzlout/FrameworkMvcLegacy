<?php

/**
 * 
 * @since Test Suite v1.0.0
 */

namespace WebDevJL\Framework\Tests\Core\Cache;

use WebDevJL\Framework\Core\Cache\ApcCache;

class ApcCacheTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->app = new \WebDevJL\Framework\Tests\TestApplication();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $this->assertNotNull($this->app);
        $result = new ApcCache($this->app);
        $this->assertInstanceOf('WebDevJL\Framework\Core\Cache\ApcCache', $result);
    }

    //Write the next tests below...
}
