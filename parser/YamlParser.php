<?php

namespace SwaggerParser\Parser;

use SwaggerParser\Swagger;

class YamlParser implements ParserInterface
{
    public function parse($file)
    {
        return new Swagger();
    }
}