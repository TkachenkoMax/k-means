<?php

require_once 'ClusterManager.php';
require_once 'Cluster.php';
require_once 'Point.php';

class Space
{
    private $dataset;
    private $amount;
    private $clusters;

    /**
     * Space constructor.
     * @param array $dataset
     * @param int $amount
     */
    public function __construct(array $dataset, int $amount)
    {
        $this->dataset = $dataset;
        $this->amount = $amount;
        $this->clusters = new ClusterManager();
    }

    /**
     * Space bootstrap. 
     *
     * @return $this
     */
    public function bootstrap()
    {
        $keys = array_rand($this->dataset, $this->amount);

        $centroids = array_map(function ($key) {
            return $this->dataset[$key];
        }, $keys);

        $i = 1;
        foreach ($centroids as $centroid) {
            $this->clusters->addCluster(new Cluster($i++, $centroid));
        }
        
        $this->assignDatasetPoints();
        
        return $this;
    }

    /**
     * Assign points from given dataset to clusters.
     */
    private function assignDatasetPoints()
    {
        foreach ($this->dataset as $point) {
            $distances = [];
            foreach ($this->clusters->getClusters() as $cluster) {
                $centroid = $cluster->getCentroid();
                $distances[$cluster->getId()] = $this->distanceBetweenTwoPoints($point, $centroid);
            }

            $minDistance = array_keys($distances, min($distances))[0];

            $this->clusters->getClusterById($minDistance)->addPoint($point);
        }
    }
    
    /**
     * Perform k-means algorithm with given amount of iterations. 
     *
     * @param $iterations
     * @return $this
     */
    public function performAlgorithm($iterations)
    {
        for ($i = 0; $i < $iterations; $i++) {
            foreach ($this->clusters->getClusters() as $cluster) {
                $cluster->setCentroid($cluster->getAveragePoint());
                $cluster->clearPoints();
            }
            
            $this->assignDatasetPoints();
        }
        
        return $this;
    }

    /**
     * Convert result space to array form. 
     *
     * @return array
     */
    public function getResultArray()
    {
        return $this->clusters->toArray();
    }
    
    /**
     * Get distance between two points.
     *
     * @param Point $a
     * @param Point $b
     * @return float
     */
    private function distanceBetweenTwoPoints(Point $a, Point $b) : float 
    {
        return sqrt(pow(($b->getX() - $a->getX()), 2) + pow(($b->getY() - $a->getY()), 2));
    }
}