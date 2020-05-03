<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = new \App\Models\User;
    }
    
    /** @test */
    public function that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('Billy');

        // Here we're testing that we can get the first name once set
        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new \App\Models\User;

        $user->setLastName('Garrett');

        $this->assertEquals($user->getLastName(), 'Garrett');
    }

    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');

        $this->assertEquals($user->getFullName(), 'Billy Garrett');
    }

    public function testThatFirstAndLastNameAreTrimmed()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Billy      ');
        $user->setLastName('     Garrett');

        $this->assertEquals($user->getFirstName(), 'Billy');
        $this->assertEquals($user->getLastName(), 'Garrett');
    }

    public function testEmailAddressCanBeSet()
    {
        $email = 'billy@codecourse.com';
        $user = new \App\Models\User;
        $user->setEmail($email);

        $this->assertEquals($user->getEmail(), $email);
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new \App\Models\User;
        $user->setFirstName('Billy      ');
        $user->setLastName('     Garrett');
        $user->setEmail('billy@codecourse.com');
        
        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
        $this->assertEquals($emailVariables['email'], 'billy@codecourse.com');
    }
}
