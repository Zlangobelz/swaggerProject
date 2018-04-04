<?php

namespace SwaggerParser\parser\Builder\Builders;

use SwaggerParser\Parser\Builder\Components\ComponentInterface;
use SwaggerParser\parser\Builder\Components\Definition;
use SwaggerParser\Parser\Builder\Components\Info;
use SwaggerParser\parser\Builder\Components\Tag;

class SwaggerBuilder extends AbstractBuilder implements BuilderInterface
{
    public function build(array $data): ComponentInterface
    {
        $this
            ->withInfo($data['info']);

        return $this->component;
    }

    public function withInfo(array $data)
    {
        $info = (new InfoBuilder(new Info()))->build($data);
        $this->component->setField('info', $info);

        return $this;
    }

//    public function withTags(array $data)
//    {
//        $this->component->tag = (new TagBuilder(new Tag()))->build($data);
//        return $this;
//    }
//
//    public function withDefinitions(array $data)
//    {
//        $this->component->definitions = (new DefinitionBuilder(new Definition()))->build($data);
//        return $this;
//    }
//
//    public function withSecurityDefinitions(array $data)
//    {
//        $this->component->securityDefinitions = (new DefinitionBuilder(new Definition()))->build($data);
//        return $this;
//    }
}