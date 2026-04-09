<?php
abstract class Figure {
    protected integer $area;
    protected string $color;
    protected integer $sides_count;

    abstract public function infoAbout() : string;
}

class Rectangle extends Figure implements IArea{
    private integer $a;
    private integer $b;
    protected $sides_count = 4;
}

class Triangle extends Figure implements IArea{
    private integer $a;
    private integer $b;
    private integer $c;
    protected $sides_count = 3;
}

class Square extends Figure implements IArea{
    private integer $a;
    protected $sides_count = 4;
}

interface IArea {
    public function calculateArea() : integer;
}
?>

