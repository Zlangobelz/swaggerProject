<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use SwaggerParser\Exceptions\FileNotFoundException;

class SwaggerTestCase extends TestCase
{
    protected function getFilePath($filename)
    {
        $filePath = __DIR__ . "\\examples\\" . $filename;
        return $filePath;
    }
}