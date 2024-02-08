<?php 

abstract class Voiture {
    private $brand;
    private $color;
    public $power = 100;
    public $speed = 0;
    static public $engine = "V8";
    const LEAVE_CAR = "Je sors de la voiture";
    public $immat = "AX563-67";

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

    protected function lightsOn() {
        echo "J'allume les feux de route !";
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


class Cabriolet extends Voiture {
    public $accessories;

    public function __construct($brand, $color, $accessories) {
        $this->accessories = $accessories;
        parent::__construct($brand, $color); 
    }
 
    // public function roof() {
    //     echo "J'ouvre le toit de la voiture<br>";
        // J'utilise une méthode protected de la classe parent lightsOn
    //     echo $this->lightsOn();
    // } 

    // public function showImmat() {
    //     echo $this->immat;
    // }

    // public function vidange() {
    //     return "Je fais ma vidange ce soir dans mon cabriolet ! ";
    // }
}


class SUV {
    private $height = '2.5m';

    public function vidange() {
        return "Je fais ma vidange ce soir dans mon SUV ! ";
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($new) {
        $this->height = $new;
    }
}



// $merco = new Voiture('Mercedez', 'verte');
// echo $merco->getColor();

// echo Voiture::radio();
// echo "<br>";
// echo Voiture::crash($merco->getBrand());

// $cabriolet = new Cabriolet('peugeot', 'jaune', 'ABS');
// $cabriolet->roof();
// echo $cabriolet->vidange();
// var_dump($cabriolet);
// echo "<br>";
// $suv = new SUV('ford', 'noir');
// $suv->vidange();

// Proposer moi une classe DB qui permettra de se connecter via PDO à notre BDD

