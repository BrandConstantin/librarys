<?php

//get_class_vars($class);
//get_object_vars($object);
//property_exists($class, $property);

class Student {

    public $first_ame;
    public $last_name;
    public $country = 'None';
    protected $registration_id;
    private $tuition = 480.00;

    public function hello_world() {
        return 'Hello world!';
    }

    protected function hello_family() {
        return 'Hello family!';
    }

    private function hello_me() {
        return 'Hello me!';
    }

    function full_name() {
        return $this->first_ame . " " . $this->last_name;
    }
    
    public function tuition_fmt(){
        return '$'.$this->tuition;
    }

}

class PartTimeStudent extends Student {

    public function hello_parent() {
        return $this->hello_family();
    }

}

$student1 = new Student;
$student1->first_ame = 'Lucy';
$student1->last_name = 'Ricardo';


echo $student1->first_ame . " " . $student1->last_name . "<br/>";

echo $student1->hello_world() . "<br/>";
//echo $student1->hello_world()."<br/>";
//echo $student1->hello_me()."<br/>";
//echo $student1->$registration_id."<br/>";
//echo $student1->$tuition."<br/>";

echo "----------------------------<br/>";

$student2 = new PartTimeStudent;
$student2->first_ame = 'Ethel';
$student2->last_name = 'Mertz';

echo $student2->first_ame . " " . $student2->last_name . "<br/>";
echo $student2->hello_parent() . " " . $student2->hello_world() . "<br/>";
//overloading
$student2->tuition = 2300;
echo $student2->tuition."<br/>";
echo $student2->tuition_fmt()."<br/>";
