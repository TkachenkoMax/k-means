<?php

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
        $keys = array_rand($this->dataset, $this->clusters);

        $centroids = array_map(function ($key) {
            return $this->dataset[$key];
        }, $keys);
        
        $i = 1;
        foreach ($centroids as $centroid) {
            $this->clusters->addCluster(new Cluster($i++, $centroid));
        }

        foreach ($this->dataset as $point) {
            $distances = [];
            foreach ($this->clusters->getCentroids() as $centroid) {
                $distances[] = $this->distanceBetweenTwoPoints($point, array($centroid->getX(), $centroid->getY()));
            }

            $minDistance = min($distances);

        }
        
        return $this;
    }

    /**
     * Get distance between two points.
     *
     * @param array $a
     * @param array $b
     * @return float
     */
    private function distanceBetweenTwoPoints(array $a, array $b)
    {
        return sqrt(pow(($b[0] - $a[0]), 2) + pow(($b[1] - $a[1]), 2));
    }
}