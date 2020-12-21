<?php


namespace PyrexFwi\PlantUml\WorkBreakdownStructure;


interface WbsNodeInterface
{
    const DIRECTION_LEFT = '<';
    const DIRECTION_RIGHT = '>';
    public function normalize(int $level = null): ?string;
    public function addChild(Node $serviceNode): void;
    public function addChildren(iterable $children): void;
    public function getName(): string;

}