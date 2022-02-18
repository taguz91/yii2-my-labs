<?php

namespace common\swagger;

use OpenApi\Analysis;
use OpenApi\Annotations\Tag;
use OpenApi\Logger;
use OpenApi\Generator;
use OpenApi\Annotations\Operation;
use OpenApi\Annotations\PathItem;
use OpenApi\Context;

class PathsTagProcessor
{

    /** @var string[] */
    private $avaliableTags;

    public function __construct(array $avaliableTags = [])
    {
        $this->avaliableTags = $avaliableTags;
    }

    public function __invoke(Analysis $analysis)
    {
        $paths = [];
        // Merge @OA\PathItems with the same path.
        if ($analysis->openapi->paths !== Generator::UNDEFINED) {
            foreach ($analysis->openapi->paths as $annotation) {

                if (
                    property_exists($annotation, 'tags') &&
                    $this->isPermitedTag($annotation->tags) === false
                ) {
                    continue;
                }

                if (
                    property_exists($annotation, 'tags')
                ) {
                    $annotation->tags = $this->onlyPermitedTag($annotation->tags);
                }


                if (empty($annotation->path)) {
                    Logger::notice($annotation->identity() . ' is missing required property "path" in ' . $annotation->_context);
                } elseif (isset($paths[$annotation->path])) {
                    $paths[$annotation->path]->mergeProperties($annotation);
                    $analysis->annotations->detach($annotation);
                } else {
                    $paths[$annotation->path] = $annotation;
                }
            }
        }

        /** @var Operation[] $operations */
        $operations = $analysis->unmerged()->getAnnotationsOfType(Operation::class);

        // Merge @OA\Operations into existing @OA\PathItems or create a new one.
        foreach ($operations as $operation) {
            if (
                property_exists($operation, 'tags') &&
                $this->isPermitedTag($operation->tags) === false
            ) {
                continue;
            }

            if (
                property_exists($operation, 'tags')
            ) {
                $operation->tags = $this->onlyPermitedTag($operation->tags);
            }


            if ($operation->path) {
                if (empty($paths[$operation->path])) {
                    $paths[$operation->path] = new PathItem(
                        [
                            'path' => $operation->path,
                            '_context' => new Context(['generated' => true], $operation->_context),
                        ]
                    );
                    $analysis->annotations->attach($paths[$operation->path]);
                }
                if ($paths[$operation->path]->merge([$operation])) {
                    Logger::notice('Unable to merge ' . $operation->identity() . ' in ' . $operation->_context);
                }
            }
        }

        if (count($paths)) {
            $analysis->openapi->paths = array_values($paths);
        }
    }

    private function isPermitedTag(array $tags)
    {
        $correct = false;
        foreach ($tags as $tag) {
            if ($tag instanceof Tag) {
                $correct = in_array($tag->name, $this->avaliableTags);
            } else {
                $correct = in_array($tag, $this->avaliableTags);
            }

            if ($correct) {
                break;
            }
        }
        return $correct;
    }

    private function onlyPermitedTag(array $tags)
    {
        $filterTags = [];
        $controller = current($tags);
        foreach ($tags as $tag) {
            if ($tag instanceof Tag) {
                $correct = in_array($tag->name, $this->avaliableTags);
            } else {
                $correct = in_array($tag, $this->avaliableTags);
            }

            if ($correct) {
                $filterTags[] = $controller;
            }
        }

        return $filterTags;
    }
}
