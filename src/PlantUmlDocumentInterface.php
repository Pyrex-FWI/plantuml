<?php declare(strict_types=1);


namespace PyrexFwi\PlantUml;

interface PlantUmlDocumentInterface
{
    public function getHeader(): ?string;
    public function getBody(): string;
    public function getFooter(): ?string;
    public function getDocumentContent(): ?string;
}
