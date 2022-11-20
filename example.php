<?php
declare(strict_types = 1);

require_once 'Jackdaw/FunctionNotFoundException.php';
require_once 'Jackdaw/ClassNotFoundException.php';
require_once 'Jackdaw/ClassMethodNotFoundException.php';
require_once 'Jackdaw/Jackdaw.php';

use Jackdaw\Jackdaw;

require_once 'SampleController.php';

function global_function($params = null)
{
    echo __FUNCTION__;
    
    print_r($params);
}

$action = $_GET['action'];
$params = $_GET;

try {
    $jackdaw = new Jackdaw($action, $params);
    $jackdaw->go();
} catch (exception $e) {
    print_r($e);
    http_response_code(404);
}

?>