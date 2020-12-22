<?php
declare(strict_types=1);

namespace PyrexFwi\PlantUml\WorkBreakdownStructure;


class Style
{
    const HORIZONTAL_ALIGNMENTS = ['left', 'right', 'center'];
    /** @var string  */
    private $defaultLineColor = '#9bcd41';
    /** @var string  */
    private $defaultArrowLineColor = 'green';
    /** @var string */
    protected $customStyle;
    /** @var float */
    private $defaultArrowLineThickness = 1.5;
    /** @var float */
    private $defaultArrowLineStyle = 0;
    /** @var string */
    private $defaultNodeBackgroundColor = 'whitesmoke';
    /** @var string  */
    private $defaultNodeHorizontalAlignment = 'left';
    /** @var string  */
    private $defaultNodeLineColor = 'blue';
    /** @var int  */
    private $defaultNodeLineStyle = 0;
    /** @var float  */
    private $defaultNodeLineThickness = 2.5;
    /** @var float */
    private $defaultNodeMargin = 3;
    /** @var float */
    private $defaultNodeMaximumWidth = 0;
    /** @var int float */
    private $defaultNodePadding = 12;
    /** @var float */
    private $defaultNodeRoundCorner = 20;
    /**
     * @var string
     */
    private $defaultFontColor = '#030f40';

    /**
     * @param string $defaultFontColor
     * @return Style
     */
    public function setDefaultFontColor(string $defaultFontColor): Style
    {
        $this->defaultFontColor = $defaultFontColor;

        return $this;
    }

    public function getDefaultStyle()
    {
        return <<<EOT
  // all lines (meaning connector and borders, there are no other lines in WBS) are black by default
  Linecolor $this->defaultLineColor
  FontColor $this->defaultFontColor
  arrow {
    //LineColor $this->defaultArrowLineColor
    LineStyle $this->defaultArrowLineStyle
    LineThickness $this->defaultArrowLineThickness
  }

  node {
    BackgroundColor $this->defaultNodeBackgroundColor
    HorizontalAlignment $this->defaultNodeHorizontalAlignment
    LineColor $this->defaultNodeLineColor
    LineStyle $this->defaultNodeLineStyle
    LineThickness $this->defaultNodeLineThickness
    Margin $this->defaultNodeMargin
    MaximumWidth $this->defaultNodeMaximumWidth
    Padding $this->defaultNodePadding
    RoundCorner $this->defaultNodeRoundCorner
  }

EOT;
    }

    public function normalize(): string
    {
        return sprintf("%s\n%s", $this->getDefaultStyle(), $this->customStyle);
    }

    /**
     * @param string $defaultLineColor
     * @return $this
     */
    public function setDefaultLineColor(string $defaultLineColor): self
    {
        $this->defaultLineColor = $defaultLineColor;

        return $this;
    }

    /**
     * @param string $defaultArrowLineColor
     */
    public function setDefaultArrowLineColor(string $defaultArrowLineColor): self
    {
        $this->defaultArrowLineColor = $defaultArrowLineColor;

        return $this;
    }

    public function addStyle(string $style): self
    {
        $this->customStyle .= $style;

        return $this;
    }

    /**
     * @param float $defaultArrowLineThickness
     * @return Style
     */
    public function setDefaultArrowLineThickness(float $defaultArrowLineThickness): Style
    {
        $this->defaultArrowLineThickness = $defaultArrowLineThickness;

        return $this;
    }

    /**
     * @param float $defaultArrowLineStyle
     * @return Style
     */
    public function setDefaultArrowLineStyle(float $defaultArrowLineStyle)
    {
        $this->defaultArrowLineStyle = $defaultArrowLineStyle;

        return $this;
    }

    /**
     * @param string $defaultNodeBackgroundColor
     * @return Style
     */
    public function setDefaultNodeBackgroundColor(string $defaultNodeBackgroundColor): Style
    {
        $this->defaultNodeBackgroundColor = $defaultNodeBackgroundColor;

        return $this;
    }

    /**
     * @param string $defaultNodeHorizontalAlignment
     * @return Style
     */
    public function setDefaultNodeHorizontalAlignment(string $defaultNodeHorizontalAlignment): Style
    {
        if (!in_array($defaultNodeHorizontalAlignment, self::HORIZONTAL_ALIGNMENTS)) {
            throw new \InvalidArgumentException('Invalid alignment');
        }

        $this->defaultNodeHorizontalAlignment = $defaultNodeHorizontalAlignment;

        return $this;
    }

    /**
     * @param string $defaultNodeLineColor
     * @return Style
     */
    public function setDefaultNodeLineColor(string $defaultNodeLineColor): Style
    {
        $this->defaultNodeLineColor = $defaultNodeLineColor;

        return $this;
    }

    /**
     * @param int $defaultNodeLineStyle
     * @return Style
     */
    public function setDefaultNodeLineStyle(int $defaultNodeLineStyle): Style
    {
        $this->defaultNodeLineStyle = $defaultNodeLineStyle;

        return $this;
    }

    /**
     * @param float $defaultNodeLineThickness
     * @return Style
     */
    public function setDefaultNodeLineThickness(float $defaultNodeLineThickness): Style
    {
        $this->defaultNodeLineThickness = $defaultNodeLineThickness;

        return $this;
    }

    /**
     * @param float $defaultNodeMargin
     * @return Style
     */
    public function setDefaultNodeMargin(float $defaultNodeMargin): self
    {
        $this->defaultNodeMargin = $defaultNodeMargin;

        return $this;
    }

    /**
     * @param float $defaultNodeMaximumWidth
     * @return Style
     */
    public function setDefaultNodeMaximumWidth(float $defaultNodeMaximumWidth): self
    {
        $this->defaultNodeMaximumWidth = $defaultNodeMaximumWidth;

        return $this;
    }

    /**
     * @param int $defaultNodePadding
     * @return Style
     */
    public function setDefaultNodePadding(int $defaultNodePadding): Style
    {
        $this->defaultNodePadding = $defaultNodePadding;

        return $this;
    }

    /**
     * @param float $defaultNodeRoundCorner
     * @return Style
     */
    public function setDefaultNodeRoundCorner(float $defaultNodeRoundCorner): self
    {
        $this->defaultNodeRoundCorner = $defaultNodeRoundCorner;

        return $this;
    }


}