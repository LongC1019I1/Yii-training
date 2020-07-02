<?php
namespace frontend\tests;

use frontend\models\User;

class UserTestD extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests

    public function testValidation()
    {
        $user = new User();

        $user->setName(null);
        $this->assertFalse($user->validate(['username']));

        $user->setName('toolooooongnaaaaaaameeee');
        $this->assertTrue($user->validate(['username']));

        $user->setName(123);
        $this->assertFalse($user->validate(['username']));

        $user->setName('daver');
        $this->assertTrue($user->validate(['username']));
    }
//
//    public function testSomeFeature()
//    {
//        $user = new User();
//
//        $user->setName(null);
//        $this->assertFalse($user->validate(['username']));
//
//        $user->setName('toolooooongnaaaaaaameeee');
//        $this->assertFalse($user->validate(['username']));
//
//        $user->setName('davert');
//        $this->assertTrue($user->validate(['username']));
//
//    }
}