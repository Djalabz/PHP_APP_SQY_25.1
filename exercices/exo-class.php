<?php 

class Voiture {
    private $brand;
    private $color;
    public $power = 100;
    public $speed = 0;
    static public $engine = "V8";

    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
    }

    static public function radio() {
        echo "J'allume l'autoradio";
    }

    public function accelerer() {
        $this->speed += 50;
        // $this->speed = $this->speed + 50; 
        echo "La voiture $this->brand de couleur $this->color roule à $this->speed<br>";
    }

    public function freiner() {
        $this->speed -= 50;
        echo "La voiture $this->brand de couleur $this->color roule à $this->speed<br>";
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getColor() {
        return $this->color;
    }

    static public function crash($voiture) {
        return "Notre voiture s'est crashée avec le $voiture";
    } 
}

$merco = new Voiture('Mercedez', 'verte');
echo $merco->getColor();

echo Voiture::radio();
echo "<br>";
echo Voiture::crash($merco->getBrand());