<?php

class Cluster
{
    private $id;
    private $centroid;
    private $points;

    /**
     * Cluster constructor.
     * @param int $id
     * @param array $centroid
     */
    public function __construct(int $id, array $centroid)
    {
        $this->id = $id;
        $this->centroid = new Point($centroid[0], $centroid[1]);
        $this->points = [];
    }

    /**
     * Add point to the cluster
     *
     * @param array $point
     */
    public function addPoint(array $point)
    {
        $this->points[] = new Point($point[0], $point[1]);
    }

    /**
     * Delete point from the cluster
     *
     * @param $number
     */
    public function deletePoint($number)
    {
        unset($this->points[$number]);
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getCentroid()
    {
        return $this->centroid;
    }

    /**
     * @param $centroid
     */
    public function setCentroid($centroid)
    {
        $this->centroid = $centroid;
    }

    /**
     * @return array
     */
    public function getPoints()
    {
        return $this->points;
    }
}