<?php

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = new User;
    }

    public function test_it_gets_first_name()
    {
        $this->user->setFirstName('Kiel');

        $this->assertEquals('Kiel', $this->user->firstName());
    }

    public function test_it_gets_last_name()
    {
        $this->user->setLastName('Jose');

        $this->assertEquals('Jose', $this->user->lastName());
    }

    public function test_it_gets_fullName()
    {
        $this->user->setFirstName('Kiel');

        $this->user->setLastName('Jose');

        $this->assertEquals('Kiel Jose', $this->user->fullName());
    }

    public function test_first_and_last_name_are_trimmed()
    {
        $this->user->setFirstName('         Kiel');
        $this->user->setLastName('Jose              ');

        $this->assertEquals('Kiel', $this->user->firstName());
        $this->assertEquals('Jose', $this->user->lastName());
    }

    public function test_email_address_can_be_set()
    {
        $email = 'kiel.legaspi.jose@gmail.com';

        $this->user->setEmail($email);

        $this->assertEquals($email, $this->user->email());
    }

    public function test_email_variables_has_correct_values()
    {
        $this->user->setFirstName('Kiel');
        $this->user->setLastName('Jose');
        $this->user->setEmail('kiel.legaspi.jose@gmail.com');

        $emailVariables = $this->user->emailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Kiel Jose', $emailVariables['full_name']);
        $this->assertEquals('kiel.legaspi.jose@gmail.com', $emailVariables['email']);
    }
}