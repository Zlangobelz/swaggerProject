<?php

namespace SwaggerParser\Validator\Config;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class SwaggerConfiguration implements ConfigurationInterface
{

    public function getConfigTreeBuilder() : TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root("root");

        $root
            ->children()
                ->arrayNode('definitions')->end()
                    ->append($this->addDefinitionsNode())
                ->arrayNode('info')->end()
                    ->append($this->addInfoNode())
                ->scalarNode('host')->end()
                ->arrayNode('paths')->end()
                    ->append($this->addPathsNode())
                ->scalarNode('basePath')->end()
                ->scalarNode('swagger')->end()
                ->arrayNode('definitions')->end()
                    ->append($this->addDefinitionsNode())
                ->arrayNode('securityDefinitions')->end()
                    ->append($this->addSecurityDefinitionsNode())
                ->arrayNode('schemes')->scalarPrototype()->end()->end()
                ->arrayNode('tags')->end()
                    ->append($this->addTagsNode())
                ->arrayNode('externalDocs')->end()
                    ->append($this->addExternalDocsNode())
            ->end()
        ;

        return $treeBuilder;
    }

    private function addTagsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('tags');

        $node
            ->arrayPrototype()
                ->children()
                    ->scalarNode('name')->end()
                    ->scalarNode('description')->end()
                    ->arrayNode("externalDocs")->end()
                        ->append($this->addExternalDocsNode())
                ->end()
            ->end()
        ;

        return $node;
    }

    private function addSecurityDefinitionsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('securityDefinitions');

        $node
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->children()
                    ->scalarNode('name')->end()
                    ->scalarNode('type')->end()
                    ->arrayNode('scopes')
                        ->scalarPrototype()->end()
                    ->end()
                    ->scalarNode('authorizationUrl')->end()
                    ->scalarNode('flow')->end()
                    ->scalarNode('in')->end()
                ->end()
            ->end()
        ;

        return $node;
    }

    private function addPathsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('paths');

        $node
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->arrayPrototype()
                    ->children()
                        ->scalarNode('name')->end()
                        ->arrayNode("tags")->scalarPrototype()->end()->end()
                        ->scalarNode('summary')->end()
                        ->scalarNode('description')->end()
                        ->scalarNode('operationId')->end()
                        ->arrayNode("consumes")->scalarPrototype()->end()->end()
                        ->arrayNode("produces")->scalarPrototype()->end()->end()
                        ->arrayNode("security")
                            ->arrayPrototype()->useAttributeAsKey('name')
                                ->arrayPrototype()->useAttributeAsKey('name')
                                    ->scalarPrototype()->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode("parameters")->end()
                        ->booleanNode("deprecated")->end()
                            ->append($this->addParametersNode())
                        ->arrayNode("responses")->end()
                            ->append($this->addResponsesNode())
            ->end()
        ;

        return $node;
    }

    private function addDefinitionsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('definitions');

        $node
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->children()
                    ->scalarNode('xml')->end()
                        ->append($this->addXmlNode())
                    ->scalarNode('type')->end()
                    ->arrayNode("properties")->end()
                        ->append($this->addPropertiesNode())
                    ->arrayNode("required")->scalarPrototype()->end()->end()
                ->end()
            ->end()
        ;

        return $node;
    }

    private function addResponsesNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('responses');

        $node
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->children()
                    ->scalarNode('description')->end()
                    ->integerNode('statusCode')->end()
                    ->arrayNode("headers")->end()
                        ->append($this->addHeaderNode())
                    ->arrayNode("schema")->end()
                        ->append($this->addSchemaNode())
                ->end()
            ->end()
        ;

        return $node;
    }

    private function addHeaderNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('headers');

        $node
            ->arrayPrototype()
                ->children()
                    ->scalarNode('description')->end()
                    ->scalarNode('name')->end()
                    ->scalarNode("type")->end()
                    ->scalarNode('format')->end()
            ->end()
        ;

        return $node;
    }

    private function addParametersNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('parameters');

        $node
            ->arrayPrototype()
                ->children()
                    ->scalarNode('in')->end()
                    ->scalarNode('name')->end()
                    ->scalarNode('description')->end()
                    ->booleanNode('required')->end()
                    ->scalarNode('type')->end()
                    ->scalarNode('format')->end()
                    ->floatNode('minimum')->end()
                    ->arrayNode('default')
                        ->children()
                            ->scalarNode("description")->end()
                        ->end()
                    ->end()
                    ->floatNode('maximum')->end()
                    ->scalarNode('collectionFormat')->end()
                    ->arrayNode("items")->end()
                        ->append($this->addItemsNode())
                    ->arrayNode("schema")->end()
                        ->append($this->addSchemaNode())
            ->end()
        ;

        return $node;
    }

    private function addPropertiesNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("properties");

        $node
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->children()
                    ->scalarNode("type")->end()
                    ->scalarNode("format")->end()
                    ->scalarNode("description")->end()
                    ->arrayNode("enum")->scalarPrototype()->end()->end()
                    ->scalarNode("default")->end()
                    ->scalarNode("\$ref")->end()
                    ->scalarNode("example")->end()
                    ->arrayNode("xml")->end()
                        ->append($this->addXmlNode())
                    ->arrayNode("items")->end()
                        ->append($this->addItemsNode())
                ->end()
            ->end()
        ;

        return $node;
    }

    private function addInfoNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('info');

        $node
            ->children()
                ->scalarNode("description")->end()
                ->scalarNode("version")->end()
                ->scalarNode("title")->end()
                ->scalarNode("termsOfService")->end()
                ->arrayNode("contact")->end()
                    ->append($this->addContactNode())
                ->arrayNode("license")->end()
                    ->append($this->addLicenseNode())
            ->end()
        ;

        return $node;
    }

    private function addXmlNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("xml");

        $node
            ->children()
                ->scalarNode("name")->end()
                ->booleanNode("wrapped")->end()
            ->end()
        ;

        return $node;
    }

    private function addSchemaNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("schema");

        $node
            ->children()
                ->scalarNode("\$ref")->end()
                ->scalarNode("type")->end()
                ->arrayNode("items")->end()
                    ->append($this->addItemsNode())
                ->arrayNode("additionalProperties")->end()
                    ->append($this->addAdditionalPropertiesNode())
            ->end()
        ;

        return $node;
    }

    private function addContactNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("contact");

        $node
            ->children()
                ->scalarNode("email")->end()
            ->end()
        ;

        return $node;
    }

    private function addExternalDocsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("externalDocs");

        $node
            ->children()
                ->scalarNode("description")->end()
                ->scalarNode("url")->end()
            ->end()
        ;

        return $node;
    }

    private function addLicenseNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("license");

        $node
            ->children()
                ->scalarNode("name")->end()
                ->scalarNode("url")->end()
            ->end()
        ;

        return $node;
    }

    private function addItemsNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("items");

        $node
            ->children()
                ->scalarNode("\$ref")->end()
                ->scalarNode("type")->end()
                ->scalarNode("default")->end()
                ->arrayNode("enum")->scalarPrototype()->end()->end()
            ->end()
        ;

        return $node;
    }

    private function addAdditionalPropertiesNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root("additionalProperties");

        $node
            ->children()
            ->scalarNode("format")->end()
            ->scalarNode("type")->end()
            ->end()
        ;

        return $node;
    }
}