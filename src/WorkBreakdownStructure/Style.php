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
     *
     * @return static
     */
    public function setDefaultFontColor(string $defaultFontColor): self
    {
        $this->defaultFontColor = $defaultFontColor;

        return $this;
    }

    public function getDefaultStyle(): string
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
     *
     * @return static
     */
    public function setDefaultArrowLineColor(string $defaultArrowLineColor): self
    {
        $this->defaultArrowLineColor = $defaultArrowLineColor;

        return $this;
    }

    /**
     * @return static
     */
    public function addStyle(string $style): self
    {
        $this->customStyle .= $style;

        return $this;
    }

    /**
     * @param float $defaultArrowLineThickness
     *
     * @return static
     */
    public function setDefaultArrowLineThickness(float $defaultArrowLineThickness): self
    {
        $this->defaultArrowLineThickness = $defaultArrowLineThickness;

        return $this;
    }

    /**
     * @param float $defaultArrowLineStyle
     *
     * @return static
     */
    public function setDefaultArrowLineStyle(float $defaultArrowLineStyle): self
    {
        $this->defaultArrowLineStyle = $defaultArrowLineStyle;

        return $this;
    }

    /**
     * @param string $defaultNodeBackgroundColor
     *
     * @return static
     */
    public function setDefaultNodeBackgroundColor(string $defaultNodeBackgroundColor): self
    {
        $this->defaultNodeBackgroundColor = $defaultNodeBackgroundColor;

        return $this;
    }

    /**
     * @param string $defaultNodeHorizontalAlignment
     *
     * @return static
     */
    public function setDefaultNodeHorizontalAlignment(string $defaultNodeHorizontalAlignment): self
    {
        if (!in_array($defaultNodeHorizontalAlignment, self::HORIZONTAL_ALIGNMENTS)) {
            throw new \InvalidArgumentException('Invalid alignment');
        }

        $this->defaultNodeHorizontalAlignment = $defaultNodeHorizontalAlignment;

        return $this;
    }

    /**
     * @param string $defaultNodeLineColor
     *
     * @return static
     */
    public function setDefaultNodeLineColor(string $defaultNodeLineColor): self
    {
        $this->defaultNodeLineColor = $defaultNodeLineColor;

        return $this;
    }

    /**
     * @param int $defaultNodeLineStyle
     *
     * @return static
     */
    public function setDefaultNodeLineStyle(int $defaultNodeLineStyle): self
    {
        $this->defaultNodeLineStyle = $defaultNodeLineStyle;

        return $this;
    }

    /**
     * @param float $defaultNodeLineThickness
     *
     * @return static
     */
    public function setDefaultNodeLineThickness(float $defaultNodeLineThickness): self
    {
        $this->defaultNodeLineThickness = $defaultNodeLineThickness;

        return $this;
    }

    /**
     * @param float $defaultNodeMargin
     *
     * @return static
     */
    public function setDefaultNodeMargin(float $defaultNodeMargin): self
    {
        $this->defaultNodeMargin = $defaultNodeMargin;

        return $this;
    }

    /**
     * @param float $defaultNodeMaximumWidth
     *
     * @return static
     */
    public function setDefaultNodeMaximumWidth(float $defaultNodeMaximumWidth): self
    {
        $this->defaultNodeMaximumWidth = $defaultNodeMaximumWidth;

        return $this;
    }

    /**
     * @param int $defaultNodePadding
     *
     * @return static
     */
    public function setDefaultNodePadding(int $defaultNodePadding): self
    {
        $this->defaultNodePadding = $defaultNodePadding;

        return $this;
    }

    /**
     * @param float $defaultNodeRoundCorner
     *
     * @return static
     */
    public function setDefaultNodeRoundCorner(float $defaultNodeRoundCorner): self
    {
        $this->defaultNodeRoundCorner = $defaultNodeRoundCorner;

        return $this;
    }


}