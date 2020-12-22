<?php declare(strict_types=1);


namespace PyrexFwi\PlantUml\WorkBreakdownStructure;

use InvalidArgumentException;

class Node implements WbsNodeInterface
{
    /** @var Node[] */
    private $children = [];
    /** @var string */
    private $name;
    /** @var int */
    private $level = 1;
    /**
     * @var string
     */
    private $position;
    /**
     * @var null|Node
     */
    private $parent;
    /** @var string */
    private $inlineColor;

    /**
     * Node constructor.
     * @param string $text
     * @param Node|null $parent
     */
    public function __construct(string $text, Node $parent = null)
    {
        $this->name = $text;
        $this->parent = $parent;
    }

    public function normalize(int $level = null): string
    {
        $level = $level ? intval($level) : $this->level;
        $stream = strtr(
            '%level%inlineColor%position %text',
            [
                '%level'       => str_repeat('*', $level),
                '%inlineColor' => $this->inlineColor,
                '%position'    => $this->position,
                '%text'        => $this->name,
            ]
        );

        foreach ($this->children as $subNode) {
            if ($str = $subNode->normalize($level + 1)) {
                $stream .= "\n".$str;
            }
        }

        return $stream;
    }

    public function addChild(Node $serviceNode): void
    {
        $name = $serviceNode->getName();
        if (isset($this->children[$name])) {
            throw new InvalidArgumentException(sprintf("The node name '%s' already exist in structure", $name));
        }
        $this->children[$name] = $serviceNode;
    }

    /**
     * @param Node[] $children
     */
    public function addChildren(iterable $children): void
    {
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return static
     */
    public function setToLeftPosition(): self
    {
        $this->position = self::DIRECTION_LEFT;

        return $this;
    }

    /**
     * @return static
     */
    public function setToRightPosition(): self
    {
        $this->position = self::DIRECTION_RIGHT;

        return $this;
    }

    /**
     * @param string $w3cColor
     * @return static
     */
    public function setInlineColor(string $w3cColor): self
    {
        $this->inlineColor = sprintf('[#%s]', $w3cColor);

        return $this;
    }
}
