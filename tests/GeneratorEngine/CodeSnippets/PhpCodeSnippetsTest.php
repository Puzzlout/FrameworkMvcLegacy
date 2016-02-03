<?php

/**
 * 
 * @since Test Suite v1.1.0
 */

namespace Puzzlout\Framework\Tests\GeneratorEngine\CodeSnippets;

use Puzzlout\Framework\GeneratorEngine\CodeSnippets\PhpCodeSnippets;

class PhpCodeSnippetsTest extends \PHPUnit_Framework_TestCase {

    protected $app;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->app = new \Puzzlout\Framework\Tests\TestApplication();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $this->assertNotNull($this->app);
        $result = new PhpCodeSnippets($this->app);
        $this->assertInstanceOf('Puzzlout\Framework\GeneratorEngine\CodeSnippets\PhpCodeSnippets', $result);
    }

    //Write the next tests below...
}
