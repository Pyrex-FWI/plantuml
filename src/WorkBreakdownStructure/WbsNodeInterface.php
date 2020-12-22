<?php declare(strict_types=1);


namespace PyrexFwi\PlantUml\WorkBreakdownStructure;

interface WbsNodeInterface
{
    public const DIRECTION_LEFT = '<';
    public const DIRECTION_RIGHT = '>';

    public function normalize(int $level = null): ?string;

    public function addChild(Node $serviceNode): self;

    /**
     * @param Node[] $children
     */
    public function addChildren(iterable $children): self;

    public function getName(): string;
}
