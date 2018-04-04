<?php

namespace SwaggerParser\Parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;

class LicenseBuilder extends AbstractBuilder implements BuilderInterface
{

    public function build(array $data): ComponentInterface
    {
        $this->withName($data['name'])
             ->withUrl($data['url']);

        return $this->component;
    }

    private function withName(string $data)
    {
        $this->component->setField('name', $data);

        return $this;
    }

    private function withUrl(string $data)
    {
        $this->component->setField('url', $data);

        return $this;
    }
}