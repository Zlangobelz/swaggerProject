<?php

namespace SwaggerParser\Validator;

interface ValidatorInterface
{
    public function validate(array $data);
}