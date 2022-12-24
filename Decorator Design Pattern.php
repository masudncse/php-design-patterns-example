<?php
interface Car {
    public function assemble();
}

class BasicCar implements Car {
    public function assemble() {
        // code to assemble a basic car
    }
}

// The Decorator class
abstract class CarDecorator implements Car {
    protected $car;

    public function __construct(Car $car) {
        $this->car = $car;
    }

    public function assemble() {
        $this->car->assemble();
    }
}

class SportsCar extends CarDecorator {
    public function assemble() {
        parent::assemble();
        // code to add sports car features
    }
}

class LuxuryCar extends CarDecorator {
    public function assemble() {
        parent::assemble();
        // code to add luxury car features
    }
}

// Client code
$basicCar = new BasicCar();
$sportsCar = new SportsCar($basicCar);
$luxuryCar = new LuxuryCar($basicCar);

$sportsCar->assemble(); // Assembles a sports car
$luxuryCar->assemble(); // Assembles a luxury car
