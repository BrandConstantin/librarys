<?php

//static methods cannot use pseudo-variabe $this->

class Student {

    public static $grades = ['Freshman', 'Sophomore', 'Junior', 'Senior'];
    private static $total_students = 0;

    public static function motto() {
        return "To learn PHP OOP!";
    }

    public static function count() {
        return self::$total_students;
    }

    public static function add_student() {
        self::$total_students++;
    }

}

echo Student::$grades[0]."<br/>";
echo Student::motto()."<br/>";
echo Student::count()."<br/>";
echo Student::add_student()."<br/>";
echo Student::count()."<br/>";

echo "<hr/>";

//static properties and methods are inherited
class PartTimeStudent extends Student{
    
}

echo PartTimeStudent::$grades[1]."<br/>";
echo PartTimeStudent::motto()."<br/>";
echo "<br/>";

PartTimeStudent::$grades[] = "Alumni";

echo implode(', ', Student::$grades);

echo "<hr/>";

Student::add_student();
Student::add_student();
Student::add_student();
echo Student::count();

echo "<br/>";

PartTimeStudent::add_student();
PartTimeStudent::add_student();
echo PartTimeStudent::count();
echo "<br/>";
echo Student::count();