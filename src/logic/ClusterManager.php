<?php

class ClusterManager
{
    private $clusters;

    /**
     * ClusterManager constructor.
     */
    public function __construct()
    {
        $this->clusters = [];
    }

    /**
     * Add cluster to the ClusterManager 
     *
     * @param Cluster $cluster
     */
    public function addCluster(Cluster $cluster)
    {
        $this->clusters[] = $cluster;
    }

    /**
     * Get clusters' centroids 
     *
     * @return array
     */
    public function getCentroids()
    {
        $centroids = [];
        foreach ($this->clusters as $cluster)
        {
            $centroids[$cluster->getId()] = $cluster->getCentroid();
        }
        
        return $centroids;
    }
}