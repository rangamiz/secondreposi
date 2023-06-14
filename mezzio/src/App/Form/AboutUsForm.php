<?php
declare(strict_types=1);

namespace App\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\Input;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator\EmailAddress;
use Laminas\Validator\StringLength;

class AboutUsForm extends Form
{
    public function __construct()
    {
        parent::__construct('AboutUsForm', []);
        $this->add(
            ['name' => 'username',
                'type' => 'text'
            ]
        );

        $this->add(
            ['name' => 'email',
                'type' => 'text'
            ]
        );

        $username = new Input('username');
        //$greaterThan = new GreaterThan();
        $username->getValidatorChain()->attach(new stringLength(['min' => 4]));
        $email = new Input('email');
        $emailValidator = new EmailAddress();
        $emailValidator->getHostnameValidator()->useTldCheck(false);
        $email->getValidatorChain()->attach($emailValidator);
        $inputFilter = new InputFilter();
        $inputFilter->add($username);
        $inputFilter->add($email);
        $this->setInputFilter($inputFilter);

    }
}