<?php
namespace Robots\Test;
use PHPUnit\Framework\TestCase;
use Robots\Controller\RobotController;

class Test extends TestCase
{
    public function testRobotType()
    {
        $controller = new RobotController;

        $res = "it's a flying robot fly.";
        $this->assertSame($res, $controller->robotIs('FL837RX'));

        $res = "it's a walking robot walk.";
        $this->assertSame($res, $controller->robotIs('WK811BC'));
    }
}