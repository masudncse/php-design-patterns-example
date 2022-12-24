<?php

// Product.php

class Product
{
    private $parts = [];

    public function add(string $part): void
    {
        $this->parts[] = $part;
    }

    public function listParts(): void
    {
        echo "Product parts: " . implode(', ', $this->parts) . "\n";
    }
}

// Builder.php

interface Builder
{
    public function producePartA(): void;
    public function producePartB(): void;
    public function producePartC(): void;
}

// ConcreteBuilder1.php

class ConcreteBuilder1 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new Product();
    }

    public function producePartA(): void
    {
        $this->product->add("PartA1");
    }

    public function producePartB(): void
    {
        $this->product->add("PartB1");
    }

    public function producePartC(): void
    {
        $this->product->add("PartC1");
    }

    public function getProduct(): Product
    {
        $result = $this->product;
        $this->reset();

        return $result;
    }
}

// ConcreteBuilder2.php

class ConcreteBuilder2 implements Builder
{
    private $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->product = new Product();
    }

    public function producePartA(): void
    {
        $this->product->add("PartA2");
    }

    public function producePartB(): void
    {
        $this->product->add("PartB2");
    }

    public function producePartC(): void
    {
        $this->product->add("PartC2");
    }

    public function getProduct(): Product
    {
        $result = $this->product;
        $this->reset();

        return $result;
    }
}

// Director.php

class Director
{
    public function build(Builder $builder): void
    {
        $builder->producePartA();
        $builder->producePartB();
        $builder->producePartC();
    }
}

// Example usage

$director = new Director();

$builder1 = new ConcreteBuilder1();
$director->build($builder1);
$product1 = $builder1->getProduct();
$product1->listParts();

$builder2 = new ConcreteBuilder2();
$director->build($builder2);
$product2 = $builder2->getProduct();
$product2->listParts();
