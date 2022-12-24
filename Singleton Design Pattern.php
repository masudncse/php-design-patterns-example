<?php

class Singleton
{
    private static $instance;

    private function __construct()
    {
        // private constructor to prevent direct instantiation
    }

    public static function getInstance(): Singleton
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __clone()
    {
        // private __clone() method to prevent cloning
    }

    private function __wakeup()
    {
        // private __wakeup() method to prevent unserializing
    }
}

// Example usage

$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();

echo $instance1 === $instance2; // outputs "true"
