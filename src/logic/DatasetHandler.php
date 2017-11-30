<?php

require_once 'Point.php';

class DatasetHandler
{
    /** Path to the files with data */
    const PATH = '/../../data/';
    
    private $fileName;

    /**
     * DatasetHandler constructor.
     * @param int $datasetNumber
     */
    public function __construct(int $datasetNumber)
    {
        $this->fileName = $datasetNumber . '.txt';
    }

    /**
     * Read data from text file.
     *
     * @return array
     */
    public function getData() : array
    {
        $file = file_get_contents(__DIR__ . DatasetHandler::PATH . $this->fileName);
        $rows = explode("\n", $file);
        $data = [];

        foreach ($rows as $row) {
            preg_match_all('!\d+!', $row, $matches);

            array_push($data, new Point((int) $matches[0][0], (int) $matches[0][1]));
        }

        return $data;
    }
}