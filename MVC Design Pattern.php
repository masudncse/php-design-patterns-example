<?php
class Model {
    private $data;

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }
}

class View {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function output() {
        return '<a href="controller.php?action=clicked">' . $this->model->getData() . '</a>';
    }
}

class Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function clicked() {
        $this->model->setData('Data updated');
    }
}

// Client code
$model = new Model();
$controller = new Controller($model);
$view = new View($model);

if (isset($_GET['action'])) {
    $controller->{$_GET['action']}();
}

echo $view->output();
