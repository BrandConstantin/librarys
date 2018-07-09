<?php

class Beverage {

    public $name;

    function __construct() {
        echo "New beverage was created.<br />";
    }

    function __clone() {
        echo "Existing beverage was copied.<br />";
    }

}

$a = new Beverage;
$a->name = "coffee";
echo $a->name . '<br />';

echo '<hr />';

$b = clone $a;
echo $a->name . '<br />';
echo $b->name . '<br />';

echo '<hr />';

$c = clone $b;
$c->name = "orange juice";
echo $a->name . '<br />';
echo $b->name . '<br />';
echo $c->name . '<br />';

echo '<hr />';

$d = &$b;
echo $b->name . '<br />';
echo $d->name . '<br />';
$b->name = "juice";
echo $b->name . '<br />';
echo $d->name . '<br />';