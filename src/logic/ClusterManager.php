<?php

require_once 'Cluster.php';

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
     * Add cluster to the ClusterManager.
     *
     * @param Cluster $cluster
     */
    public function addCluster(Cluster $cluster)
    {
        $this->clusters[] = $cluster;
    }

    /**
     * Get cluster by its id.
     *
     * @param int $id
     * @return Cluster
     */
    public function getClusterById(int $id) : Cluster
    {
        foreach ($this->clusters as $cluster)
        {
            if ($cluster->getId() === $id) {
                return $cluster;
            }
        }
        
        return null;
    }

    /**
     * @return array
     */
    public function getClusters()
    {
        return $this->clusters;
    }

    /**
     * Convert points to array.
     *
     * @return array
     */
    public function toArray()
    {
        $mapped = [];

        foreach ($this->clusters as $cluster) {
            $mapped[$cluster->getId()] = array_map(function ($point) {
                return [
                    'x' => $point->getX(),
                    'y' => $point->getY()
                ];
            }, $cluster->getPoints());
        }

        return $mapped;
    }
}