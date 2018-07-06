<?php

class Bicycle{
    var $brand;
    var $model;
    var $year;
    var $description;
    var $weight_kg = 0.0;
    
    function name(){
        return $this->brand." ".$this->model." ".$this->year;
    }
    
  function weight_lbs() {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }
}

$bicycle1 = new Bicycle;
$bicycle1->brand = "Pegasus";
$bicycle1->model = "K02g";
$bicycle1->year = '2018';
$bicycle1->weight_kg = 23;

$bicycle2 = new Bicycle;
$bicycle2->brand = "Pegasus";
$bicycle2->model = "003h";
$bicycle2->year = '2001';
$bicycle2->weight_kg = 27;

$trek = new Bicycle;
$trek->brand = "Trek";

echo "The name of bicycle is ".$bicycle1->name()."<br/>";
echo "This bicycle have ".$bicycle1->weight_lbs()." lbs<br/>";
echo "This bicycle have ".$bicycle1->weight_kg." kg<br/>";

echo "<br/><hr/><br/>";

echo "The name of bicycle is ".$bicycle2->name()."<br/>";
echo "This bicycle have ".$bicycle2->weight_lbs()." lbs<br/>";
echo "This bicycle have ".$bicycle2->weight_kg." kg<br/>";

echo "<br/><hr/><br/>";

echo "The name of bicycle is ".$bicycle2->name()."<br/>";
$trek->set_weight_lbs(12);
echo "This bicycle have ".$trek->weight_lbs()." lbs<br/>";
echo "This bicycle have ".$trek->weight_kg." kg<br/>";