<?php

namespace SwaggerParser\Parser\Builder;

use SwaggerParser\parser\Builder\Builders\SwaggerBuilder;
use SwaggerParser\parser\Builder\Components\Swagger;

class SwaggerDirector implements DirectorInterface
{
    public function make(array $data)
    {
        var_dump((new SwaggerBuilder(new Swagger()))->build($data));
    }
}

