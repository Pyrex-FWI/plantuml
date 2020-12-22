<?php

require_once __DIR__.'/../vendor/autoload.php';

//create document
$wbs = new \PyrexFwi\PlantUml\WorkBreakdownStructure\WorkBreakdownStructure('RootNode');

//add subitems
$wbs->addNode(new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Node A'));
$wbs->addNode(new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Node B'));
$wbs->addNode(new \PyrexFwi\PlantUml\WorkBreakdownStructure\Node('Node C'));

//get document as plantuml string
echo $wbs->getDocumentContent();
