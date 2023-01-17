<?php
class Activite{

	private int $idAct;
	private String $date;
	private String $description	;
    private String $duree;
    private float $distance_parcourue;
	private float $cardio_freq_min;
	private float $cardio_freq_max;
    private float $cardio_freq_moy;
	private int $unUtilisateur;

    public function __construct(){  }
    public function init($date,$descri,$duree,$distParc,$freqMin,$freqMax,$freqMoy,$idUtili){
        $this->idAct = -1;
        $this->date = $date;
        $this->description = $descri;
        $this->duree = $duree;
        $this->distance_parcourue = $distParc;
        $this->cardio_freq_min = $freqMin;
        $this->cardio_freq_max = $freqMax;
        $this->cardio_freq_moy = $freqMoy;
        $this->unUtilisateur = $idUtili;
    }

    public function getIdAct(): int { return $this->idAct; }
    public function getDate(): string { return $this->date; }
    public function getDescription(): string { return $this->description; }
    public function getDuree(): string { return $this->duree; }
    public function getDistParcourue(): float { return $this->distance_parcourue; }
    public function getFreqMin(): float { return $this->cardio_freq_min; }
    public function getFreqMax(): float { return $this->cardio_freq_max; }
    public function getFreqMoy(): float { return $this->cardio_freq_moy; }
    public function getUnUtilisateur(): int { return $this->unUtilisateur; }


    public function setIdAct(int $i): void { $this->idAct = $i; }
    public function setDate(string $d): void { $this->date = $d; }
    public function setDescription(string $d): void { $this->description = $d; }
    public function setDuree(string $d): void { $this->duree = $d; }
    public function setDistParcourue(float $dp): void { $this->distance_parcourue = $dp; }
    public function setFreqMin(float $f): void { $this->cardio_freq_min = $f; }
    public function setFreqMax(float $f): void { $this->cardio_freq_max = $f; }
    public function setFreqMoy(float $f): void { $this->cardio_freq_moy = $f; }
    public function setUnUtilisateur(int $unU): void { $this->unUtilisateur = $unU; }

    public function __toString(){
        return $this->idAct. " ".$this->date. " ". $this->description." ". $this->duree." ". $this->distance_parcourue." ". $this->cardio_freq_min." ". $this->cardio_freq_max." ". $this->cardio_freq_moy." ". $this->unUtilisateur;
    }

}
?>