<?php
abstract class Figure {
    protected int $area;
    protected string $color;
    protected int $sides_count;

    abstract public function infoAbout() : string;
}

class Rectangle extends Figure implements IArea{
    private int $a;
    private int $b;
    protected int $sides_count = 4;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function getArea(){
        return $this->a * $this->b;
    }

    public function infoAbout() {
        return "Это класс прямоугольника. У него {$this->sides_count} стороны.";
    }
}

class Triangle extends Figure implements IArea{
    private int $a;
    private int $b;
    private int $c;
    protected int $sides_count = 3;

    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getArea(){
        $halfPerimetr = ($this->a+$this->b+$this->c)/2;
        return sqrt($halfPerimetr*($halfPerimter-$this->a)*($halfPerimter-$this->b)*($halfPerimter-$this->c));
    }

    public function infoAbout() {
        return "Это класс треугольника. У него {$this->sides_count} стороны.";
    }
}


class Square extends Figure implements IArea{
    private int $a;
    protected int $sides_count = 4;

    public function __construct($a) {
        $this->a = $a;
    }

    public function getArea(){
        return $this->a * $this->a;
    }

    public function infoAbout() {
        return "Это класс квадрата. У него {$this->sides_count} стороны.";
    }
}


interface IArea {
    public function getArea();
}
?>

