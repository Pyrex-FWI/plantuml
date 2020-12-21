<?php


namespace PyrexFwi\PlantUml;


use PyrexFwi\PlantUml\WorkBreakdownStructure\Style;

abstract class AbstractPlantUmlDocument implements PlantUmlDocumentInterface
{
    /** @var string */
    protected $endDoc;
    /** @var string */
    protected $startDoc;

    /**
     * @var Style
     */
    private $style;

    /**
     * AbstractPlantUmlDocument constructor.
     */
    public function __construct()
    {
        $this->style = new Style();
    }

    public function getHeader(): string
    {
        return $this->startDoc;
    }

    public function getDocumentContent(): string
    {
        return strtr(
            "%start\n\n%style\n\n%body\n\n%end",
            [
                '%start' => $this->getHeader(),
                '%style' => "<style>\nwbsDiagram {\n".$this->getStyle()->normalize()."\n}\n</style>",
                '%body' => $this->getBody(),
                '%end' => $this->getFooter(),
            ]
        );
    }

    public function getFooter(): string
    {
        return $this->endDoc;
    }

    public function getStyle(): Style
    {
        return $this->style;
    }

}