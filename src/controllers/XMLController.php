<?php
namespace src\controllers;

use core\Controller;
use Exception;
use src\handlers\CSVWritter;
use src\handlers\Request;
use src\handlers\Session;
use src\models\XML;

final class XMLController extends Controller
{
    private XML $xml;

    public function handle()
    {
        $request = new Request();
        $file = $request->getRequestFiles();

        try {
            $this->xml = new XML($file['xml']);
            $xml = $this->xml->format();

            $dets = array_map(function ($det) {
                return serialize($det);
            }, $xml->dets);

            Session::set("providerName", $xml->providerName);
            Session::set("dets", $dets);

            $this->redirect('/show');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show()
    {
        $hasDets = Session::hasValueIn('dets');
        $hasProvider = Session::hasValueIn('providerName');

        if (!$hasProvider || !$hasDets) {
            $this->redirect('/');
        }

        $dets = array_map(function ($det) {
            return unserialize($det);
        }, Session::get('dets'));

        $this->render('show', [
            "providerName" => Session::get('providerName'),
            "dets" => $dets,
        ]);
    }

    public function createCsv()
    {
        $hasDets = Session::hasValueIn('dets');
        $hasProvider = Session::hasValueIn('providerName');

        if (!$hasProvider || !$hasDets) {
            $this->redirect('/');
        }

        $writter = new CSVWritter();

        $dets = array_map(function ($det) {
            return (array) unserialize($det);
        }, Session::get('dets'));

        $userDets = filter_input(
            INPUT_POST,
            "dets",
            FILTER_DEFAULT,
            FILTER_FORCE_ARRAY
        );

        $filteredDets = array_filter($dets, function ($det) use ($userDets) {
            return in_array($det['id'], $userDets);
        });

        $writter->setPath("./storage/csv/nfes.csv")->write($filteredDets);

        $this->redirect('/thanks');
    }
}
