<?php
abstract class Figure {
    protected integer $area;
    protected string $color;
    protected integer $sides_count;

    abstract public function infoAbout() : string;
}

class Rectangle extends Rectangle{

}

class Triangle extends Rectangle{

}

class Square extends Rectangle{

}
?>

