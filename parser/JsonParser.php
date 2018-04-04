<?php

namespace SwaggerParser\Parser;

use SwaggerParser\Swagger;

class JsonParser implements ParserInterface
{
    public function parse($file)
    {
        return new Swagger();
    }
}