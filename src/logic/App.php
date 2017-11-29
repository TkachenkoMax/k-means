<?php

class App
{
    private $datasetNumber;
    private $clustersAmount;
    private $iterationsAmount;

    /**
     * App constructor.
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->datasetNumber = $post['dataset'];
        $this->clustersAmount = $post['clusters'];
        $this->iterationsAmount = $post['iterations'];
    }

    /**
     * App handler 
     *
     * @return mixed
     */
    public function handle()
    {
        $datasetHandler = new DatasetHandler($this->datasetNumber);
        $dataset = $datasetHandler->getData();
        $space = new Space($dataset, $this->clustersAmount);
        $result = $space->bootstrap()->performAlgorithm($this->iterationsAmount);
        
        return $result;
    }
}