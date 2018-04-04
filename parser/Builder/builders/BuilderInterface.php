<?php

namespace SwaggerParser\Parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;

interface BuilderInterface
{
    public function build(array $data) : ComponentInterface;
}