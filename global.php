<?php

    require_once __DIR__ . "/classes/config.php";

    spl_autoload_register('loadClass');

    function loadClass($className) {
        require_once "classes/" . $className . ".php";
    }