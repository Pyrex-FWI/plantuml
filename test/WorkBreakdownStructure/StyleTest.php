<?php declare(strict_types=1);

namespace PlantUmlTest\WorkBreakdownStructure;

use PyrexFwi\PlantUml\WorkBreakdownStructure\Style;
use PHPUnit\Framework\TestCase;

class StyleTest extends TestCase
{
    /** @var Style */
    static protected $style;

    /**
     * @beforeClass
     *
     * @return void
     */
    public static function beforeFixtures(): void
    {
        self::$style = new Style();
    }

    public function testNormalize(): void
    {
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString(self::$style->getDefaultStyle(), $normalizedContent);
    }

    public function testSetDefaultLineColor(): void
    {
        self::$style->setDefaultLineColor('red');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('Linecolor red', $normalizedContent);
    }

    public function testSetDefaultNodeHorizontalAlignment(): void
    {
        self::$style->setDefaultNodeHorizontalAlignment('center');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('HorizontalAlignment center', $normalizedContent);
        $this->expectException(\InvalidArgumentException::class);
        self::$style->setDefaultNodeHorizontalAlignment('space');

    }

    public function testSetDefaultNodeMargin(): void
    {
        self::$style->setDefaultNodeMargin(60);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('Margin 60', $normalizedContent);
    }

    public function testSetDefaultNodeLineColor(): void
    {
        self::$style->setDefaultNodeLineColor('orange');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineColor orange', $normalizedContent);
    }

    public function testSetDefaultNodeLineStyle(): void
    {
        self::$style->setDefaultNodeLineStyle(3);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineStyle 3', $normalizedContent);
    }

    public function testSetDefaultFontColor(): void
    {
        self::$style->setDefaultFontColor('green');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('FontColor green', $normalizedContent);
    }

    public function testSetDefaultNodeLineThickness(): void
    {
        self::$style->setDefaultNodeLineThickness(2.5);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineThickness 2.5', $normalizedContent);
    }

    public function testSetDefaultNodeRoundCorner(): void
    {
        self::$style->setDefaultNodeRoundCorner(35);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('RoundCorner 35', $normalizedContent);
    }

    public function testAddStyle(): void
    {
        self::$style->addStyle("//some style");
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('//some style', $normalizedContent);
    }

    public function testSetDefaultNodeMaximumWidth(): void
    {
        self::$style->setDefaultNodeMaximumWidth(55);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('MaximumWidth 55', $normalizedContent);
    }

    public function testSetDefaultNodePadding(): void
    {
        self::$style->setDefaultNodePadding(5);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('Padding 5', $normalizedContent);
    }

    public function testSetDefaultArrowLineThickness(): void
    {
        self::$style->setDefaultArrowLineThickness(5.2);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineThickness 5.2', $normalizedContent);
    }

    public function testSetDefaultArrowLineStyle(): void
    {
        self::$style->setDefaultArrowLineStyle(3);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineStyle 3', $normalizedContent);
    }

    public function testSetDefaultArrowLineColor(): void
    {
        self::$style->setDefaultArrowLineColor('cyan');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineColor cyan', $normalizedContent);
    }

    public function testSetDefaultNodeBackgroundColor(): void
    {
        self::$style->setDefaultNodeBackgroundColor('cyan');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('BackgroundColor cyan', $normalizedContent);
    }
}
