
<?php
spl_autoload_register(function($class){
    require dirname(__DIR__) .
    "Shoes/{$class}.php";
});
session_start();