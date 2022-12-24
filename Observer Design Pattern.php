<?php
interface Shape {
    public function draw();
}

class Rectangle implements Shape {
    public function draw() {
        // code to draw a rectangle
    }
}

class Circle implements Shape {
    public function draw() {
        // code to draw a circle
    }
}

// The Adapter class
class ShapeAdapter implements Shape {
    private $shape;

    public function __construct(Shape $shape) {
        $this->shape = $shape;
    }

    public function draw() {
        switch (get_class($this->shape)) {
            case "Circle":
                // code to adapt a Circle to a Rectangle
                break;
            case "Rectangle":
                // code to adapt a Rectangle to a Circle
                break;
        }
    }
}

// Client code
$circle = new Circle();
$rectangle = new Rectangle();

$circleAdapter = new ShapeAdapter($circle);
$rectangleAdapter = new ShapeAdapter($rectangle);

$circleAdapter->draw(); // Adapted drawing of a Circle as a Rectangle
$rectangleAdapter->draw(); // Adapted drawing of a Rectangle as a Circle
