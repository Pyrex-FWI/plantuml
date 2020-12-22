<?php

require_once __DIR__.'/../vendor/autoload.php';

//create document
$wbs = new \PyrexFwi\PlantUml\WorkBreakdownStructure\WorkBreakdownStructure('RootNode');

//add subitems
$nodes[] = new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Node A');
$nodes[] = new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Node B');
$nodes[] = new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Node C');

$nodes[1]
    ->addChild(new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Sub B.1'))
    ->addChild(
        (new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Sub B.B'))
            ->setToLeftPosition()
            ->setInlineColor('green')
    )
;
$nodes[2]->setInlineColor('lightgray');

$wbs
    ->addChildrenNodes($nodes)
    ->getRootNode()
        ->setInlineColor('pink');

echo $wbs->getDocumentContent();
