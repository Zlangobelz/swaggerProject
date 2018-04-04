<?php

namespace SwaggerParser\Parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;

class ContactBuilder extends AbstractBuilder implements BuilderInterface
{
    public function build(array $data): ComponentInterface
    {
        $this->withEmail($data['email']);

        return $this->component;
    }

    private function withEmail(string $data)
    {
        $this->component->setField('email', $data);

        return $this;
    }
}