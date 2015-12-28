<?php

use WebDevJL\Framework\BO\F_common_resource;

class F_common_resourceTest extends PHPUnit_Framework_TestCase
{
    public function testInstanciation()
    {
        $result = new F_common_resource();
        $this->assertInstanceOf('\WebDevJL\Framework\BO\F_common_resource', $result);
    }
}