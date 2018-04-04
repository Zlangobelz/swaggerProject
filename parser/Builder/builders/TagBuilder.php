<?php

namespace SwaggerParser\parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;

class TagBuilder extends AbstractBuilder implements BuilderInterface
{
    public function build(array $data) : ComponentInterface
    {
        return $this->component;
    }
}