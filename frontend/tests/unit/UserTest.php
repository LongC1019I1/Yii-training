<?php
namespace frontend\tests;

use frontend\models\User;

class UserTestD extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

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

    public function testSomeFeature()
    {

    }

    public function testPassword(  )
    {
        $model = new User();
        $password = 'tsdfds';

        //8ky tu
        $this->assertEquals( false, $model->validatePassword(''));
        $this->assertEquals( false, $model->validatePassword('123456'));
        $this->assertEquals( false, $model->validatePassword('123456'));
        $this->assertEquals( false, $model->validatePassword('123456'));
//        $this->assertEquals( 'password ko duoc rong', $model->validatePassword(''));

//        //1 ky tư in hoa
//        if(preg_match("/[A-Z]/", $password)===0) {
//           $this->assertTrue();
//        }
//
//        //1 ky tư thuong
//
//        if(preg_match("/[a-z]/", $password)===0) {
//            $this->assertTrue();
//        }
//
//        //1 so
//        if(preg_match("/[0-9]/", $password)===0) {
//            $this->assertTrue();
//        }
    }



}