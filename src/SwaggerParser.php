<?php

namespace SwaggerParser\Core;

use SwaggerParser\Core\Component\Swagger;
use SwaggerParser\Core\Exceptions\ClassNotExistException;
use SwaggerParser\Core\Exceptions\FileNotFoundException;

class SwaggerParser
{
    public static function parse(array $data)
    {
        try {
            $swagger = new Swagger($data);
            return $swagger;
        } catch (FileNotFoundException $e) {
            echo $e->getMessage();
            die();
        } catch (ClassNotExistException $e) {
            echo $e->getMessage();
            die();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}