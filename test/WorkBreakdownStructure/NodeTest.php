<?php declare(strict_types=1);

namespace PlantUmlTest\WorkBreakdownStructure;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PyrexFwi\PlantUml\WorkBreakdownStructure\Node;

class NodeTest extends TestCase
{
    public function testInstance(): Node
    {
        $node = new Node('MyNode');
        $this->assertEquals('MyNode', $node->getName());
        $this->assertStringContainsString('*', $node->normalize());
        $this->assertStringContainsString('* MyNode', $node->normalize());

        return $node;
    }

    /**
     * @depends testInstance
     *
     * @return Node
     */
    public function testSetToLeftPosition(Node $node): Node
    {
        $node->setToLeftPosition();
        $this->assertStringContainsString('<', $node->normalize());

        return $node;
    }

    /**
     * @depends testSetToLeftPosition
     * @param Node $node
     * @return Node
     */
    public function testAddChildren(Node $node)
    {
        $node->addChildren([
            new Node('A'),
            new Node('B'),
        ]);

        $normalize = $node->normalize();
        $this->assertStringContainsString('** A', $normalize);
        $this->assertStringContainsString('** B', $normalize);
        $this->assertEquals(3, count(explode("\n", $normalize)));

        return $node;
    }


    /**
     * @depends testAddChildren
     *
     * @param Node $node
     *
     * @return Node
     */
    public function testSetToRightPosition(Node $node): Node
    {
        $node->setToRightPosition();
        $this->assertStringContainsString('>', $node->normalize());

        return $node;
    }

    /**
     * @depends testSetToRightPosition
     *
     * @return Node
     */
    public function testSetInlineColor(Node $node): Node
    {
        $node->setInlineColor('blue');
        $this->assertStringContainsStringIgnoringCase('[#blue]', $node->normalize());

        return $node;
    }


    /**
     * @depends testSetInlineColor
     * @param Node $node
     * @return Node
     */
    public function testAddChild(Node $node)
    {
        $this->expectException(InvalidArgumentException::class);
        $node->addChild(new Node('C'));
        $this->assertStringContainsString('** C', $node->normalize());
        $node->addChild(new Node('C'));

        return $node;
    }
}
