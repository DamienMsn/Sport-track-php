<?php
class Data{
    private int $idData;
	private String $temps;
	private float $cardio_frequence;
	private float $latitude;
	private float $longitude;
	private float $altitude;
	private int $uneAct;


    public function  __construct() { }
    public function init($temps, $lat, $long, $alt,  $card, $uneAct){
        $this->idData = -1;
        $this->temps = $temps;
        $this->latitude = $lat;
        $this->longitude = $long;
        $this->altitude = $alt;
        $this->uneAct = $uneAct;
        $this->cardio_frequence = $card;
    }

    public function getId(): int { return $this->idData; }
    public function getTemps(): string { return $this->temps; }
    public function getLatitude(): float { return $this->latitude; }
    public function getLongitude(): float { return $this->longitude; }
    public function getAltitude(): float { return $this->altitude; }
    public function getUneAct(): int { return $this->uneAct; }
    public function getCard(): float { return $this->cardio_frequence; }

    public function setId(int $i): void { $this->idData=$i; }
    public function setTemps(string $t): void { $this->temps=$t; }
    public function setLatitude(float $la): void { $this->latitude=$la; }
    public function setLongitude(float $lo): void { $this->longitude=$lo; }
    public function setAltitude(float $al): void { $this->altitude=$al; }
    public function setUneAct(int $unA): void { $this->uneAct=$unA; }
    public function setCard(float $c): void { $this->cardio_frequence=$c; }

    public function  __toString(): string { return $this->idData. " ".$this->temps." ". $this->cardio_frequence. " ". $this->latitude." ". $this->longitude." ". $this->altitude." ". $this->uneAct; }
}
?>