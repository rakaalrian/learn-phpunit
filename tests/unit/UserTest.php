<?php 

/**
* 
*/
class UserTest extends \PHPUnit\Framework\TestCase
{

	protected $user;

	public function setUp(){
		$this->user = new App\Models\User;
	}
	/** @test */
	public function get_the_first_name(){
		$this->user->setFirstName('Billy');

		$this->assertEquals($this->user->getFirstName(), 'Billy');
	}

	public function testGetTheLastName(){
		$user = new \App\Models\User;

		$user->setLastName('Garret');

		$this->assertEquals($user->getLastName(), 'Garret');
	}

	public function testGetTheFullName(){
		$user = new \App\Models\User;

		$user->setFirstName('Billy');
		$user->setLastName('Garret');

		$this->assertEquals($user->getFullName(), 'Billy Garret');
	}

	public function testGetFirstAndLastNameAreTrimmed(){
		$user = new \App\Models\User;

		$user->setFirstName('  Billy     ');
		$user->setLastName('  Garret ');

		$this->assertEquals($user->getFirstName(), 'Billy');
		$this->assertEquals($user->getLastName(), 'Garret');
	}

	public function testToSetEmailAddress(){
		$user = new \App\Models\User;

		$user->setEmail('billy@mail.com');

		$this->assertEquals($user->getEmail(), 'billy@mail.com');
	}

	public function testGetArrayContainFullNameAndEmail(){
		$user = new \App\Models\User;

		$user->setFirstName('  Billy     ');
		$user->setLastName('  Garret ');
		$user->setEmail('billy@mail.com');

		$getArrayData = $user->getArrayData();

		$this->assertArrayHasKey('full_name', $getArrayData);
		$this->assertArrayHasKey('email', $getArrayData);

		$this->assertEquals($getArrayData['full_name'], 'Billy Garret');	
		$this->assertEquals($getArrayData['email'], 'billy@mail.com');
	}

}

?>