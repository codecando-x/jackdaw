<?php
declare(strict_types = 1);
namespace Jackdaw;

class ClassMethodNotFoundException extends \Exception
{

    public function __construct()
    {
        parent::__construct(__NAMESPACE__ . " " . __CLASS__, 0, null);
    }

    public function __toString()
    {
        return __NAMESPACE__ . " " . __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

?>