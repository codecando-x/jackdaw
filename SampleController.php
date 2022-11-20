<?php
declare(strict_types = 1);

final class SampleController
{

    public static function static_function()
    {
        echo __CLASS__ . ' ' . __FUNCTION__;
    }

    public function instance_function()
    {
        echo __CLASS__ . ' ' . __FUNCTION__;
    }
}

?>