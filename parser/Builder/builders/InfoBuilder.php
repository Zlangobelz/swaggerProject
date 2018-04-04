<?php

namespace SwaggerParser\Parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;
use SwaggerParser\Parser\Builder\Components\Contact;
use SwaggerParser\Parser\Builder\Components\License;

class InfoBuilder extends AbstractBuilder implements BuilderInterface
{
    public function build(array $data): ComponentInterface
    {
        $this->withDescription($data['description'])
            ->withVersion($data['version'])
            ->withTitle($data['title'])
            ->withTermsOfService($data['termsOfService'])
            ->withContact($data['contact'])
            ->withLicense($data['license']);

       return $this->component;
    }

    private function withDescription(string $data)
    {
        $this->component->setField('description', $data);

        return $this;
    }

    private function withVersion(string $data)
    {
        $this->component->setField('version', $data);

        return $this;
    }

    private function withTitle(string $data)
    {
        $this->component->setField('title', $data);

        return $this;
    }

    private function withTermsOfService(string $data)
    {
        $this->component->setField('termsOfService', $data);

        return $this;
    }

    private function withContact(array $data)
    {
        $contact = (new ContactBuilder(new Contact()))->build($data);
        $this->component->setField('contact', $contact);

        return $this;
    }

    private function withLicense(array $data)
    {
        $license = (new LicenseBuilder(new License()))->build($data);
        $this->component->setField('license', $license);

        return $this;
    }
}