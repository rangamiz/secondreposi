<?php

namespace App\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\Input;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator\EmailAddress;
use Laminas\Validator\GreaterThan;
use Laminas\Validator\StringLength;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct('registerForm', []);
        $this->add([
            'name' => 'username',
            'type' => 'text',
        ]);
        $this->add(
            [
                'name' => 'password',
                'type' => 'password',
            ]);
        $this->add(
            [
                'name' => 'email',
                'type' => 'email',
            ]
        );
        $this->add(
            [
                'name' => 'phone',
                'type' => 'number'
            ]
        );
        $username = new Input('username');
        $username->getValidatorChain()->attach(new GreaterThan(9));

        $password = new Input('password');
        $password->getValidatorChain()->attach(new stringLength(['min' => 5]));

        $email = new Input('email');
        $emailValidator = new EmailAddress();
        $emailValidator->getHostnameValidator()->useTldCheck(false);
        $email->getValidatorChain()->attach($emailValidator);

        $phone = new Input('phone');
        $phone->getValidatorChain()->attach(new stringLength(['max' => 6]));

        $inputFilter = new InputFilter();
        $inputFilter->add($username);
        $inputFilter->add($password);
        $inputFilter->add($email);
        $inputFilter->add($phone);
        $this->setInputFilter($inputFilter);
    }


}

