<?php

class Bicycle {

    public static $instance_count = 0;
    public $brand;
    public $model;
    public $year;
    public $description = 'Used bicycle';
    private $weight_kg = 0.0;
    protected static $wheels = 2;
    public $category;

    const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

    function name() {
        return $this->brand . " " . $this->model . " " . $this->year;
    }

    function weight_lbs() {
        return floatval($this->weight_kg) * 2.2046226218;
    }

    function set_weight_lbs($value) {
        $this->weight_kg = floatval($value) / 2.2046226218;
    }

    public static function wheel_details() {
        $wheel_string = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
        return "It has " . $wheel_string . ".";
    }

    public function weight_kg() {
        return $this->weight_kg . ' kg';
    }

    public function set_weight_kg($value) {
        $this->weight_kg = floatval($value);
    }

    public static function create() {
        $class_name = get_called_class(); // must retrieve string first
        $obj = new $class_name;           // "new" expects a class or a string
        // $obj = new static              // self & static work here too!
        self::$instance_count++;
        return $obj;
    }

}

class Unicycle extends Bicycle {

    // visibility must match property being overridden
    protected static $wheels = 1;

}

$bicycle1 = new Bicycle;
$bicycle1->brand = "Pegasus";
$bicycle1->model = "K02g";
$bicycle1->year = '2018';
//$bicycle1->weight_kg = 23;

$bicycle2 = new Bicycle;
$bicycle2->brand = "Pegasus";
$bicycle2->model = "003h";
$bicycle2->year = '2001';
//$bicycle2->weight_kg = 27;

$trek = new Unicycle;
$trek->brand = "Trek";

echo "Set weight using kg<br/>";
$bicycle1->set_weight_kg(17);
echo "The name of bicycle is " . $bicycle1->name() . "<br/>";
echo "This bicycle have " . $bicycle1->weight_lbs() . " lbs<br/>";
echo "This bicycle have " . $bicycle1->weight_kg() . "<br/>";
echo $bicycle1->wheel_details();

echo "<br/><hr/><br/>";

//echo "Set weight using lbs<br/>";
//$bicycle2->set_weight_lbs(37.4785845706);
//echo "The name of bicycle is " . $bicycle2->name() . "<br/>";
//echo "This bicycle have " . $bicycle2->weight_lbs() . " lbs<br/>";
//echo "This bicycle have " . $bicycle2->weight_kg() . "<br/>";
//echo $bicycle1->wheel_details();
//
//echo "<br/><hr/><br/>";
// Will this work?
$uni = new Unicycle;
$uni->brand = "Uni 45b cv";

echo "Set weight for Unicycle<br />";
echo "The name of bicycle is " . $uni->name() . "<br/>";
$uni->set_weight_kg(1);
echo $uni->weight_kg() . "<br />";
echo $uni->weight_lbs() . "<br />";

echo "<hr/>";

echo 'Bicycle count: ' . Bicycle::$instance_count . '<br />';
echo 'Unicycle count: ' . Unicycle::$instance_count . '<br />';

$bicycle1 = Bicycle::create();
$trek = Unicycle::create();

echo 'Bicycle count: ' . Bicycle::$instance_count . '<br />';
echo 'Unicycle count: ' . Unicycle::$instance_count . '<br />';

echo "<hr />";

echo 'Categories: ' . implode(', ', Bicycle::CATEGORIES) . '<br />';
$trek->category = Bicycle::CATEGORIES[0];
echo 'Category: ' . $trek->category . '<br />';

echo "<hr />";
echo "Bicycle: " . Bicycle::wheel_details() . "<br />";
echo "Unicycle: " . Unicycle::wheel_details() . "<br />";
