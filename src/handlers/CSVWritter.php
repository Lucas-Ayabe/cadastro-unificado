<?php
namespace src\handlers;

class CSVWritter
{
    private string $path;

    public function setPath(string $path = "./storage/csv/nfes.csv"): CSVWritter
    {
        $this->path = $path;

        return $this;
    }

    public function write(array $source): void
    {
        $csv = fopen($this->path, "w");

        foreach ($source as $key => $line) {
            fputcsv($csv, $line);
        }

        fclose($csv);
    }
}
