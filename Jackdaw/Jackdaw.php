<?php
declare(strict_types = 1);
namespace Jackdaw;

final class Jackdaw
{

    private static $actionRegex = '/[a-z0-9_]+((::|->)?)[a-z0-9_]+/';

    private static $splitRegex = '[::|->]';

    private string $action;

    private $params;

    public function __construct(string $action, $params = null)
    {
        $this->action = $action;
        $this->params = $params;
    }

    public function go()
    {
        if (preg_match(self::$actionRegex, $this->action, $matches)) {

            $pieces = preg_split(self::$splitRegex, $this->action);

            if (count($pieces) == 1) {

                $globalFunction = $pieces[0];

                if (! function_exists($globalFunction)) {
                    throw new FunctionNotFoundException();
                }

                (! is_null($this->params)) ? $globalFunction($this->params) : $globalFunction();
            } else {
                list ($controller, $function) = $pieces;

                if (! class_exists($controller)) {
                    throw new ClassNotFoundException();
                }

                $controller = new $controller();

                if (! method_exists($controller, $function)) {
                    throw new ClassMethodNotFoundException();
                }

                (! is_null($this->params)) ? $controller->$function($this->params) : $controller->$function();
            }
        }
    }
}

?>