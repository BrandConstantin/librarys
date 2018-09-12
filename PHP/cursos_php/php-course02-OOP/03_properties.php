<?php

//get_class_vars($class);
//get_object_vars($object);
//property_exists($class, $property);

class Student {
    var $first_ame;
    var $last_name;
    var $country = 'None';
}

$student1 = new Student;
$student1->first_ame = 'Lucy';
$student1->last_name = 'Ricardo';

$student2 = new Student;
$student2->first_ame = 'Ethel';
$student2->last_name = 'Mertz';

echo $student1->first_ame." ".$student1->last_name."<br/>";
echo $student2->first_ame." ".$student2->last_name."<br/>";

$class_vars = get_class_vars('Student');
echo "class vars: ";
echo "<pre>";
print_r($class_vars);
echo "</pre>";

$object_vars = get_object_vars($student1);
echo "object vars: ";
echo "<pre>";
print_r($object_vars);
echo "</pre>";

if(property_exists('Student', 'first_ame')){
    echo "Property first_name exist in Student class <br/>";
}else{
    echo "Property first_name not exist in Student class <br/>";
}