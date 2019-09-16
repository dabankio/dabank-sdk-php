<?php

namespace dabank\sdk\hello;
use \PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
  public function testHello() {
    $this->assertEquals('Hello', Hello::sayHello());
    $this->assertEquals('Hello', sayHello());
  }
}
