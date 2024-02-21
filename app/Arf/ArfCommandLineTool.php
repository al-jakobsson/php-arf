<?php

namespace Arf;


class ArfCommandLineTool
{
    const int COMMAND = 1;
    const int TYPE = 2;
    const int NAME = 3;

    const int CONTROLLER_NAME = 3;
    const int CONTROLLER_METHOD = 4;

    public function __construct(
        public int $argumentCount,
        public array $arguments
    ){}

    public function start(): void
    {
        if ($this->argumentCount > 1) {
            switch (strtolower($this->arguments[self::COMMAND])) {
                case 'new':
                    if (!$this->arguments[self::TYPE]) {
                        echo <<<NO_TYPE_MESSAGE
                        Error: No type given.
                        Required format: new [Type] [Name]
                        You must enter the type of class to create, e.g. 'new Model User'.
                        Valid types:
                            Model (or model): Creates a new Model with name [Name].
                            Controller (or controller): Creates a new Controller with name in the form [Name]Controller.
                            View (or view): Creates a new View with name [Name]Page.
                            MVC (or mvc): Creates a Model, View, and Controller, with the respective name formats from [Name]
                        NO_TYPE_MESSAGE;

                        break;
                    }
                    $this->new();
                    break;
                default:
                    echo "Error: Arf doesn't understand command: {$this->arguments[self::COMMAND]}" . PHP_EOL;
            }
        } else {
            echo "No arguments provided." . PHP_EOL;
        }
    }

    private function new(): void
    {
        switch (strtolower($this->arguments[self::TYPE])) {
            case 'model':
                if (!$this->arguments[self::NAME]) {
                    echo "You must enter a name for your model, e.g. 'new Model User'" . PHP_EOL;
                    break;
                }
                $this->createNewModel();
                break;
            case 'controller':
                if (!$this->arguments[self::NAME]) {
                    echo "You must enter a name for your controller, e.g. 'new Controller User'" . PHP_EOL;
                    break;
                }
                $this->createNewController();
                break;
            case 'view':
                if (!$this->arguments[self::NAME]) {
                    echo "You must enter a name for your view, e.g. 'new View User'" . PHP_EOL;
                    break;
                }
                $this->createNewView();
                break;
            case 'mvc':
                if (!$this->arguments[self::NAME]) {
                    echo "You must enter a name for your MVC, e.g. 'new MVC User'" . PHP_EOL;
                    break;
                }
                $this->createNewMVC();
                break;
            case 'route':
                if (!$this->arguments[self::CONTROLLER_NAME] || !$this->arguments[self::CONTROLLER_METHOD]) {
                    echo "You must enter the controller name and method to register a route." . PHP_EOL;
                    break;
                }
                $this->createNewRoute();
                break;

            default:
                echo "Arf doesn't understand type: {$this->arguments[self::TYPE]}" . PHP_EOL;
        }

    }

    private function createNewModel(): void
    {
        $modelName = ucfirst($this->arguments[self::NAME]);

        Model::create($modelName);

    }

    private function createNewController(): void
    {
        $controllerName = ucfirst($this->arguments[self::NAME]);

        Controller::create($controllerName);

    }

    private function createNewView(): void
    {
        $viewName = ucfirst($this->arguments[self::NAME]);

        View::create($viewName);
    }

    private function createNewMVC(): void
    {
        $MVCName = ucfirst($this->arguments[self::NAME]);

        Model::create($MVCName);
        View::create($MVCName);
        Controller::create($MVCName);
    }

    private function createNewRoute(): void
    {
        $controllerName = ucfirst($this->arguments[self::CONTROLLER_NAME]);
        $controllerMethod = strtolower($this->arguments[self::CONTROLLER_METHOD]);

        Route::create(new Route($controllerName, $controllerMethod));
    }

}