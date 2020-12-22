<?php declare(strict_types=1);

namespace PlantUmlTest\WorkBreakdownStructure;

use PHPUnit\Framework\TestCase;
use PyrexFwi\PlantUml\WorkBreakdownStructure\Node;
use PyrexFwi\PlantUml\WorkBreakdownStructure\WorkBreakdownStructure;

/**
 * Class WorkBreakdownStructureTest
 * @backupStaticAttributes enabled
 */
class WorkBreakdownStructureTest extends TestCase
{
    /** @var WorkBreakdownStructure */
    static protected $wbs;

    /**
     * @beforeClass
     *
     * @return void
     */
    public static function beforeFixtures(): void
    {
        self::$wbs = new WorkBreakdownStructure('Root');
    }


    public function testInstance(): void
    {
        $wbs = new WorkBreakdownStructure('Instance');
        $this->assertInstanceOf(WorkBreakdownStructure::class, $wbs);
    }

    public function testAddNode(): void
    {
        self::$wbs->addNode(new Node('A'));

        $content = self::$wbs->getBody();
        $contentArray = explode("\n", $content);
        $this->assertEquals('* Root', $contentArray[0]);
        $this->assertEquals('** A', $contentArray[1]);
    }

    public function testGetDocumentContent(): void
    {
        $content = self::$wbs->getDocumentContent();
        $this->assertStringContainsString('* Root', $content);
        $this->assertStringContainsString(self::$wbs->getHeader(), $content);
        $this->assertStringContainsString(self::$wbs->getFooter(), $content);
        $this->assertStringContainsString(self::$wbs->getStyle()->normalize(), $content);
        $this->assertStringContainsString(self::$wbs->getBody(), $content);
        $this->assertStringStartsWith(self::$wbs->getHeader(), $content);
        $this->assertStringEndsWith(self::$wbs->getFooter(), $content);
    }

}
