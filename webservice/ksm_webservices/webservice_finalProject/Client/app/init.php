<?php
require_once 'config/config.php';
require_once 'core/helper.php';
require_once("../../../../vendor/autoload.php");


spl_autoload_register(function ($className) {
    require_once 'core/' . $className . '.php';
});
