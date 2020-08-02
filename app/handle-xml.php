<?php
require_once './functions.php';
session_start();

if (isset($_FILES['xml']) && !empty($_FILES['xml'])) {
    $file = $_FILES['xml'];

    
    if ($file['type'] === "text/xml") {
        $xml = simplexml_load_file($file['tmp_name']);
        $dados = $xml->NFe->infNFe;
        $dets = [];
        
        foreach($dados->det as $det) {
            $produto = (array) $det->prod;
            $imposto = (array) $det->imposto->ICMS->ICMS00;
            
            $dado = [
                "cProd" => $produto['cProd'],
                "cEAN" => $produto['cEAN'],
                "xProd" => $produto['xProd'],
                "NCM" => $produto['NCM'],
                "vUnCom" => $produto['vUnCom'],
                "orig" => $imposto['orig']
            ];

            array_push($dets, $dado);
        }
        
        $filtrado = [
            "nomeFornecedor" => $dados->emit->xNome,
            "dets" => $dets
        ];
        
        require '../show-data.php';
        exit(0);
    }
}

setFlash("Envie um arquivo XML.");
header("Location: ../index.php");
