<?php

require_once 'Point.php';

class Cluster
{
    private $id;
    private $centroid;
    private $points;

    /**
     * Cluster constructor.
     * @param int $id
     * @param Point $centroid
     */
    public function __construct(int $id, Point $centroid)
    {
        $this->id = $id;
        $this->centroid = $centroid;
        $this->points = [];
    }

    /**
     * Add point to the cluster.
     *
     * @param Point $point
     */
    public function addPoint(Point $point)
    {
        $this->points[] = $point;
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

    /**
     * Get average Point of the cluster.
     *
     * @return Point
     */
    public function getAveragePoint() : Point
    {
        $xAverage = $yAverage = 0;

        foreach ($this->points as $point) {
            $xAverage += $point->getX();
            $yAverage += $point->getY();
        }

        return new Point($xAverage/count($this->points), $yAverage/count($this->points));
    }

    /**
     * Clear cluster's points.
     */
    public function clearPoints()
    {
        $this->points = [];
    }
}