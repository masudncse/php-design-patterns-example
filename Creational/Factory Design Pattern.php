<?php

interface Animal
{
    public function speak();
}

class Dog implements Animal
{
    public function speak()
    {
        return "Woof!";
    }
}

class Cat implements Animal
{
    public function speak()
    {
        return "Meow!";
    }
}

class AnimalFactory
{
    public static function createAnimal($type)
    {
        switch ($type)
        {
            case "dog":
                return new Dog();
            case "cat":
                return new Cat();
            default:
                throw new Exception("Invalid animal type.");
        }
    }
}

$dog = AnimalFactory::createAnimal("dog");
echo $dog->speak(); // "Woof!"

$cat = AnimalFactory::createAnimal("cat");
echo $cat->speak(); // "Meow!"
