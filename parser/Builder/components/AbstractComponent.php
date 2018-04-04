<?php

namespace SwaggerParser\Parser\Builder\Components;

class AbstractComponent implements ComponentInterface
{
    public function setField($name, $value)
    {
        if (!empty($value)) $this->$name = $value;
    }
}