<?php
abstract class Animal
{
    protected $species;
    protected $weight;

    abstract public function __clone();

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}

class Sheep extends Animal
{
    public function __construct()
    {
        $this->species = "Sheep";
    }

    public function __clone()
    {
    }
}

$sheep = new Sheep();
$sheep->setWeight(5);

$cloneSheep = clone $sheep;
$cloneSheep->setWeight(10);

echo $sheep->getWeight(); // 5
echo $cloneSheep->getWeight(); // 10
