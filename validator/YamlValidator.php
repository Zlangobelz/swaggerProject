<?php

namespace SwaggerParser\Validator;

use SwaggerParser\Validator\Config\SwaggerConfiguration;
use Symfony\Component\Config\Definition\Processor;

class YamlValidator implements ValidatorInterface
{
    public function validate(array $data)
    {
        $datum["root"] = $data;

        $processor = new Processor();
        $swaggerConfig = new SwaggerConfiguration();
        return $processor->processConfiguration($swaggerConfig, $datum);
    }
}