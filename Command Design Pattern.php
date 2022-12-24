<?php
interface Command {
    public function execute();
}

class TurnOnLightCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOn();
    }
}

class TurnOffLightCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOff();
    }
}

class Light {
    public function turnOn() {
        // code to turn on the light
    }

    public function turnOff() {
        // code to turn off the light
    }
}

class RemoteControl {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute();
    }
}

// Client code
$light = new Light();

$turnOnCommand = new TurnOnLightCommand($light);
$turnOffCommand = new TurnOffLightCommand($light);

$remoteControl = new RemoteControl();

$remoteControl->setCommand($turnOnCommand);
$remoteControl->pressButton(); // turns on the light

$remoteControl->setCommand($turnOffCommand);
$remoteControl->pressButton(); // turns off the light
