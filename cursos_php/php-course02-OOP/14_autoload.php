<?php

//para crear un aviso en caso que se nos olvida incluir una clase

function my_autoload($class) {
    if (preg_match('/\A\w+\Z/', $class)) {
        include 'classes/' . $class . '.class.php';
    }
}

spl_autoload_register('my_autoload');


$bike = new Unicycle;
$bike->brand = 'Trek';
echo $bike->brand;
