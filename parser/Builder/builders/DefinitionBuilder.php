<?php

namespace SwaggerParser\parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;

class DefinitionBuilder extends AbstractBuilder implements BuilderInterface
{
    public function build(array $data): ComponentInterface
    {
        $this->withContact($data['contact']);

        return $this->component;
    }

    private function withContact(string $data)
    {
        $this->component->setField('contact', $data);

        return $this;
    }
}