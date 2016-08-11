<?php

function autoload($class) {
    $mapper = json_decode(file_get_contents('mapper.json'));
    
    $require_class = '';
    if (isset($mapper->$class)) {
        $require_class = $mapper->$class;
    }
    
    if (file_exists($require_class)) {
        require_once $require_class;
    } else {
        throw new Exception('Class "' . $class . '" not found!');
    }
}

spl_autoload_register("autoload");
