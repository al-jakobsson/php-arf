<?php

namespace Arf;


class ArfCommandLineTool
{
    const COMMAND = 1;
    const TYPE = 2;
    const NAME = 3;

    const METHOD = 3;
    const PATH = 4;
    const CONTROLLER_NAME = 5;
    const CONTROLLER_METHOD = 6;
    
    public const ARF = "ARF";

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
            case 'arf':
                if (!$this->arguments[self::NAME]) {
                    echo "You must enter a name for your Arf, e.g. 'new Arf User" . PHP_EOL;
                    break;
                }
                $this->createNewArf();
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
        $method = strtoupper($this->arguments[self::METHOD]);
        $path = $this->arguments[self::PATH];
        $controllerName = ucfirst($this->arguments[self::CONTROLLER_NAME]);
        $controllerMethod = strtolower($this->arguments[self::CONTROLLER_METHOD]);

        Route::create(new Route($method, $path, $controllerName, $controllerMethod));
    }

    private function createNewArf(): void
    {
        $arfName = ucfirst($this->arguments[self::NAME]);

        echo "Creating Arf for $arfName" . PHP_EOL;

        self::createNewMVC();

        Route::create(
            new Route(
                method: self::ARF,
                path: '/' . strtolower($arfName) . 's',
                controllerName: $arfName . 'Controller',
                controllerMethod: self::ARF
            )
        );

        echo "Created Arf - $arfName" . PHP_EOL;

    }

}