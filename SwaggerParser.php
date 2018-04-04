<?php

namespace SwaggerParser;

use SwaggerParser\Parser\ParserInterface;
use SwaggerParser\Parser\YamlParser;
use SwaggerParser\Validator\YamlValidator;
use Symfony\Component\Yaml\Yaml;

class SwaggerParser
{
    private $file;
    private $data;
    private $swagger;

    public function loadFile($filepath)
    {
        if (!file_exists($filepath)) {
            echo "File" . $filepath . "not found";
            die();
        }

        $this->file = $filepath;
        $this->data = $this->getData($filepath);
    }

    public function getObject() : Swagger
    {
        return $this->swagger;
    }

    public function loadYaml()
    {
        $data = (new YamlValidator())->validate($this->data);

        $this->swagger = $this->parse(new YamlParser(), $data);
    }

    public function loadJson()
    {
        //TODO: JsonLoader
    }

    private function parse(ParserInterface $parser, $file)
    {
        return $parser->parse($file);
    }

    private function getData($file)
    {
        if (preg_match('/.*\.json/', $file)) {
            return json_decode($file);
        } else if (preg_match('/.*\.yaml/', $file)) {
            return Yaml::parseFile($file);
        }
    }
}