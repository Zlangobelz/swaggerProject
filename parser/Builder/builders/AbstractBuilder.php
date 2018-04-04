<?php

namespace SwaggerParser\parser\Builder\builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;

class AbstractBuilder
{
    protected $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }
}