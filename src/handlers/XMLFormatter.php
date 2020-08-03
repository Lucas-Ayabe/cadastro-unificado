<?php
namespace src\handlers;

use SimpleXMLElement;

class XMLFormatter
{
    public function getDets($nfeInformation): array
    {
        $dets = [];
        $index = 0;

        foreach ($nfeInformation->det as $det) {
            $index++;

            $product = (array) $det->prod;
            $tax = (array) $det->imposto->ICMS->ICMS00;

            $mappedDet = new Det();
            $mappedDet->id = $index;
            $mappedDet->providerCode = $product['cProd'];
            $mappedDet->productDescription = $product['xProd'];
            $mappedDet->ncm = $product['NCM'];
            $mappedDet->origin = $tax['orig'];
            $mappedDet->unitaryValue = $product['vUnCom'];
            $mappedDet->ean = $product['cEAN'];

            array_push($dets, $mappedDet);
        }

        return $dets;
    }

    public function format(SimpleXMLElement $xml): NFeInformation
    {
        $nfeInformation = $xml->NFe->infNFe;
        $dets = $this->getDets($nfeInformation);

        return new NFeInformation($nfeInformation->emit->xNome, $dets);
    }
}
