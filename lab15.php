<?php
abstract class Figure {
    protected float $area;
    protected string $color;
    protected int $sides_count;

    abstract public function infoAbout() : string;
}


interface IArea {
    public function getArea() : float;
}

class Rectangle extends Figure implements IArea{
    private float $a;
    private float $b;
    protected int $sides_count = 4;

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function getArea() : float{
        $this->area = $this->a * $this->b; 
        return round($this->area,3);
    }

    public function infoAbout() : string{
        return "Это класс прямоугольника. У него {$this->sides_count} стороны.";
    }
}

class Triangle extends Figure implements IArea{
    private float $a;
    private float $b;
    private float $c;
    protected int $sides_count = 3;

    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getArea() : float{
        $halfPerimetr = ($this->a+$this->b+$this->c)/2;
        $this->area = sqrt($halfPerimetr*($halfPerimetr-$this->a)*($halfPerimetr-$this->b)*($halfPerimetr-$this->c));
        return round($this->area,3);
    }

    public function infoAbout() : string{
        return "Это класс треугольника. У него {$this->sides_count} стороны.";
    }
}


class Square extends Figure implements IArea{
    private float $a;
    protected int $sides_count = 4;

    public function __construct($a) {
        $this->a = $a;
    }

    public function getArea() : float{
        $this->area = $this->a * $this->a;
        return round($this->area,3);
    }

    public function infoAbout() : string{
        return "Это класс квадрата. У него {$this->sides_count} стороны.";
    }
}

$rectangle1 = new Rectangle(5, 10);
$rectangle2 = new Rectangle(3.5, 7.2);

$triangle1 = new Triangle(3, 4, 5); 
$triangle2 = new Triangle(5, 6, 7);

$square1 = new Square(6);
$square2 = new Square(4.5);

echo $rectangle1->infoAbout()." | Прямоугольник 1<br>";
echo "Его площадь: ".$rectangle1->getArea()."<br>";

echo $rectangle2->infoAbout()." | Прямоугольник 2<br>";
echo "Его площадь: ".$rectangle2->getArea()."<br>";

echo $triangle1->infoAbout()." | Треугольник 1<br>";
echo "Его площадь: ".$triangle1->getArea()."<br>";

echo $triangle2->infoAbout()." | Треугольник 2<br>";
echo "Его площадь: ".$triangle2->getArea()."<br>";


echo $square1->infoAbout()." | Квадрат 1<br>";
echo "Его площадь: ".$square1->getArea()."<br>";

echo $square2->infoAbout()." | Квадрат 2<br>";
echo "Его площадь: ".$square2->getArea()."<br>";
?>



