<?php
declare(strict_types=1);

namespace PyrexFwi\PlantUml\WorkBreakdownStructure;


class WorkBreakdownStructure extends \PyrexFwi\PlantUml\AbstractPlantUmlDocument
{
    /**
     * @var WbsNodeInterface
     */
    protected $rootNode;

    /**
     * WorkBreakdownStructure constructor.
     * @param string $rootNodeName
     */
    public function __construct(string $rootNodeName)
    {
        $this->startDoc = '@startwbs';
        $this->endDoc = '@endwbs';
        $this->rootNode = new Node($rootNodeName);
        parent::__construct();
    }

    public function getBody(): string
    {
        return (string) $this->rootNode->normalize();
    }

    /**
     * @return static
     */
    public function addNode(Node $writeFor): self
    {
        $this->rootNode->addChild($writeFor);

        return $this;
    }

}