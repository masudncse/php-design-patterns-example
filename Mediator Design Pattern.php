<?php
interface Mediator {
    public function send($message, Colleague $colleague);
}

abstract class Colleague {
    protected $mediator;

    public function __construct(Mediator $mediator) {
        $this->mediator = $mediator;
    }
}

class ConcreteColleagueA extends Colleague {
    public function send($message) {
        $this->mediator->send($message, $this);
    }

    public function receive($message) {
        // code to receive and process the message
    }
}

class ConcreteColleagueB extends Colleague {
    public function send($message) {
        $this->mediator->send($message, $this);
    }

    public function receive($message) {
        // code to receive and process the message
    }
}

class ConcreteMediator implements Mediator {
    private $colleagueA;
    private $colleagueB;

    public function setColleagueA(Colleague $colleague) {
        $this->colleagueA = $colleague;
    }

    public function setColleagueB(Colleague $colleague) {
        $this->colleagueB = $colleague;
    }

    public function send($message, Colleague $colleague) {
        if ($colleague === $this->colleagueA) {
            $this->colleagueB->receive($message);
        } else {
            $this->colleagueA->receive($message);
        }
    }
}

// Client code
$mediator = new ConcreteMediator();

$colleagueA = new ConcreteColleagueA($mediator);
$colleagueB = new ConcreteColleagueB($mediator);

$mediator->setColleagueA($colleagueA);
$mediator->setColleagueB($colleagueB);

$colleagueA->send('Hello World!');
$colleagueB->send('Hi there!');
