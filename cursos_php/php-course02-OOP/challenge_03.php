<?php

class Bicycle {

    public $brand;
    public $model;
    public $year;
    public $description = 'Used bicycle';
    private $weight_kg = 0.0;
    protected $wheels = 2;

    function name() {
        return $this->brand . " " . $this->model . " " . $this->year;
    }

    function weight_lbs() {
        return floatval($this->weight_kg) * 2.2046226218;
    }

    function set_weight_lbs($value) {
        $this->weight_kg = floatval($value) / 2.2046226218;
    }

    public function wheel_details() {
        $wheel_string = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
        return "It has " . $wheel_string . ".";
    }

    public function weight_kg() {
        return $this->weight_kg . ' kg';
    }

    public function set_weight_kg($value) {
        $this->weight_kg = floatval($value);
    }

}

class Unicycle extends Bicycle {

    // visibility must match property being overridden
    protected $wheels = 1;

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

echo "Set weight using lbs<br/>";
$bicycle2->set_weight_lbs(37.4785845706);
echo "The name of bicycle is " . $bicycle2->name() . "<br/>";
echo "This bicycle have " . $bicycle2->weight_lbs() . " lbs<br/>";
echo "This bicycle have " . $bicycle2->weight_kg() . "<br/>";
echo $bicycle1->wheel_details();

echo "<br/><hr/><br/>";

// Will this work?
$uni = new Unicycle;
$uni->brand = "Uni 45b cv";

 echo "Set weight for Unicycle<br />";
 echo "The name of bicycle is " . $uni->name() . "<br/>";
 $uni->set_weight_kg(1);
 echo $uni->weight_kg() . "<br />";
 echo $uni->weight_lbs() . "<br />";