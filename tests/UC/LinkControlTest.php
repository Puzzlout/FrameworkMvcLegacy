<?php

use WebDevJL\Framework\UC\LinkControl;

class LinkControlTest extends PHPUnit_Framework_TestCase
{

  public function testInstanceIsCorrect()
  {
    $result = LinkControl::Init();
    $this->assertInstanceOf('WebDevJL\Framework\UC\LinkControl', $result);
  }
  
  public function testLinkWithNoLinkUrlNorLinkText($linkUrl = "", $linkText = "")
  {
    try
    {
      LinkControl::Init()->Simple("", "");
    } catch (\Exception $exc) {
      $result = $exc;      
    }
    $this->assertInstanceOf('\InvalidArgumentException', $result);
  }
  
  public function testLinkWithLinkUrlAndLinkText()
  {
    $result = LinkControl::Init()->Simple("http://google.fr/", "Google FR");
    $this->assertEquals('<a href="http://google.fr/" target="_BLANK">Google FR</a>', $result);
  }
  
  public function testLinkWithNoLinkUrlThrowsException()
  {
    $this->testLinkWithNoLinkUrlNorLinkText("","Google FR");
  }
  
  public function testLinkWithNoLinkTextThrowsException()
  {
    $this->testLinkWithNoLinkUrlNorLinkText("http://google.fr/","");
  }
  
  public function testLinkWithInvalidLinkUrl()
  {
    //url invalid => htttp://google.fr
    try
    {
      LinkControl::Init()->Simple("htttp://google.fr/", "Google FR");
    } catch (\Exception $exc) {
      $result = $exc;      
    }
    $this->assertInstanceOf('\InvalidArgumentException', $result);
  }  
}

