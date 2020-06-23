<?php

namespace App;

class User
{
    private $firstName;

    private $lastName;

    private $email;

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function firstName()
    {
        return trim($this->firstName);
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function lastName()
    {
        return trim($this->lastName);
    }

    public function fullName()
    {
        return $this->firstName() . ' ' . $this->lastName();
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function email()
    {
        return $this->email;
    }

    public function emailVariables()
    {
        return [
            'full_name' => $this->fullName(),
            'email' => $this->email()
        ];
    }
}