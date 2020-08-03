<?php
namespace src\models;

use core\Model;
use Exception;
use SimpleXMLElement;
use src\handlers\XMLFormatter;

class Xml extends Model
{
    private SimpleXMLElement $xml;
    private XMLFormatter $formatter;

    public function __construct($file)
    {
        if (!$this->isXMLFile($file["type"])) {
            throw new Exception("The file must be a XML file.");
        }

        $this->xml = simplexml_load_file($file['tmp_name']);
        $this->formatter = new XMLFormatter();
    }

    public function getXml(): SimpleXMLElement
    {
        return $this->xml;
    }

    public function format()
    {
        return $this->formatter->format($this->xml);
    }

    private function isXMLFile(string $type): bool
    {
        return $type === "text/xml";
    }
}
