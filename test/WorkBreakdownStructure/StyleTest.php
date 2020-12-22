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
     */
    public static function beforeFixtures()
    {
        self::$style = new Style();
    }

    public function testNormalize()
    {
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString(self::$style->getDefaultStyle(), $normalizedContent);
    }

    public function testSetDefaultLineColor()
    {
        self::$style->setDefaultLineColor('red');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('Linecolor red', $normalizedContent);
    }

    public function testSetDefaultNodeHorizontalAlignment()
    {
        self::$style->setDefaultNodeHorizontalAlignment('center');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('HorizontalAlignment center', $normalizedContent);
        $this->expectException(\InvalidArgumentException::class);
        self::$style->setDefaultNodeHorizontalAlignment('space');

    }

    public function testSetDefaultNodeMargin()
    {
        self::$style->setDefaultNodeMargin(60);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('Margin 60', $normalizedContent);
    }

    public function testSetDefaultNodeLineColor()
    {
        self::$style->setDefaultNodeLineColor('orange');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineColor orange', $normalizedContent);
    }

    public function testSetDefaultNodeLineStyle()
    {
        self::$style->setDefaultNodeLineStyle(3);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineStyle 3', $normalizedContent);
    }

    public function testSetDefaultFontColor()
    {
        self::$style->setDefaultFontColor('green');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('FontColor green', $normalizedContent);
    }

    public function testSetDefaultNodeLineThickness()
    {
        self::$style->setDefaultNodeLineThickness(2.5);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineThickness 2.5', $normalizedContent);
    }

    public function testSetDefaultNodeRoundCorner()
    {
        self::$style->setDefaultNodeRoundCorner(35);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('RoundCorner 35', $normalizedContent);
    }

    public function testAddStyle()
    {
        self::$style->addStyle("//some style");
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('//some style', $normalizedContent);
    }

    public function testSetDefaultNodeMaximumWidth()
    {
        self::$style->setDefaultNodeMaximumWidth(55);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('MaximumWidth 55', $normalizedContent);
    }

    public function testSetDefaultNodePadding()
    {
        self::$style->setDefaultNodePadding(5);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('Padding 5', $normalizedContent);
    }

    public function testSetDefaultArrowLineThickness()
    {
        self::$style->setDefaultArrowLineThickness(5.2);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineThickness 5.2', $normalizedContent);
    }

    public function testSetDefaultArrowLineStyle()
    {
        self::$style->setDefaultArrowLineStyle(3);
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineStyle 3', $normalizedContent);
    }

    public function testSetDefaultArrowLineColor()
    {
        self::$style->setDefaultArrowLineColor('cyan');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('LineColor cyan', $normalizedContent);
    }

    public function testSetDefaultNodeBackgroundColor()
    {
        self::$style->setDefaultNodeBackgroundColor('cyan');
        $normalizedContent = self::$style->normalize();
        $this->assertStringContainsString('BackgroundColor cyan', $normalizedContent);
    }
}
