<?php
declare(strict_types=1);

namespace PyrexFwi\PlantUml\WorkBreakdownStructure;

use PyrexFwi\PlantUml\AbstractPlantUmlDocument;

class WorkBreakdownStructure extends AbstractPlantUmlDocument
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
     * @param Node $writeFor
     * @return static
     */
    public function addNode(Node $writeFor): self
    {
        $this->rootNode->addChild($writeFor);

        return $this;
    }

    /**
     *
     * @param Node[] $writeFor
     * @return static
     */
    public function addChildrenNodes(iterable $writeFor): self
    {
        $this->rootNode->addChildren($writeFor);

        return $this;
    }

    /**
     * @return WbsNodeInterface
     */
    public function getRootNode(): WbsNodeInterface
    {
        return $this->rootNode;
    }
}
