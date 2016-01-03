<?php

namespace WebDevJL\Framework\Tests\GeneratorEngine\Core;

use WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator;

class BaseClassGeneratorTest extends \PHPUnit_Framework_TestCase {

  /**
   * This method is generated.
   */
  public function testInstanceIsCorrect()
  {
    $result = new BaseClassGenerator();
    $this->assertInstanceOf('WebDevJL\Framework\GeneratorEngine\Core\BaseClassGenerator', $result);
  }
  
  //Write the next tests below...
  
}