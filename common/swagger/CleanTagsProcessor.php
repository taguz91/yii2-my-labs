<?php

namespace common\swagger;

use OpenApi\Analysis;
use OpenApi\Annotations\Tag;
use OpenApi\Generator;

class CleanTagsProcessor
{

    /** @var string[] */
    private $avaliableTags;

    public function __construct(array $avaliableTags = [])
    {
        $this->avaliableTags = $avaliableTags;
    }

    public function __invoke(Analysis $analysis)
    {
        $tags = [];
        // Merge @OA\PathItems with the same path.
        if (
            $analysis->openapi->tags !== Generator::UNDEFINED
            && !empty($this->avaliableTags)
        ) {
            /** @var Tag $annotation */
            foreach ($analysis->openapi->tags as $annotation) {
                if (in_array($annotation->name, $this->avaliableTags)) {
                    $tags[] = $annotation;
                }
            }
        }

        if (count($tags)) {
            $analysis->openapi->tags = $tags;
        }
    }
}
