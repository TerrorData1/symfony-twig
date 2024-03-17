<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactDTO
{

    #[NotBlank()]
    #[Length(min: 3, max: 200)]
    public string $name = '';

    #[NotBlank()]
    public string $email = '';

    #[NotBlank()]
    #[Length(min: 10, max: 200)]
    public string $message = '';

    #[NotBlank()]
    public string $service = '';
}
