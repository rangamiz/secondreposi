<?php

namespace App\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\Input;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator\StringLength;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('LoginForm', []);
        $this->add(
            [
                'name' => 'username',
                'type' => 'Text',
            ],
            [
                'name' => 'password',
                'type' => 'Password',
            ]
        );

        $usernameInput = new Input('username');
        $usernameInput->getValidatorChain()
            ->attach(new StringLength(['min' => 3, 'max' => 5]));

        $password = new Input('password');
        $password->getValidatorChain()
            ->attach(new StringLength(8));

        $inputFilter = new InputFilter();
        $inputFilter->add($usernameInput);
        $inputFilter->add($password);

        $this->setInputFilter($inputFilter);
    }
}