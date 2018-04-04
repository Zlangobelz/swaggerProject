<?php

namespace Tests\Unit;

use SwaggerParser\Parser\Builder\SwaggerDirector;
use SwaggerParser\Swagger;
use SwaggerParser\SwaggerParser;
use Symfony\Component\Yaml\Yaml;
use Tests\SwaggerTestCase;

class SwaggerParserTest extends SwaggerTestCase
{
    public function test()
    {
        $swagger = new SwaggerParser();
        $swagger->loadFile($this->getFilePath('swagger.yaml'));
        $swagger->loadYaml();
        self::assertInstanceOf(Swagger::class, $swagger->getObject());
    }

    public function testBuilder()
    {
        $director = new SwaggerDirector();
        $director->make(Yaml::parseFile($this->getFilePath('swagger.yaml')));
    }
}
