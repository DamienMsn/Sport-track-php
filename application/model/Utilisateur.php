<?php
class Utilisateur{
    private int $idUtilisateur;
    private string $nom;
    private string $prenom;
    private string $date_naissance;
    private string $sexe;
    private int $taille;
    private int $poids;
    private string $email;
    private string $mdp;

    public function  __construct() { }
    public function init($n, $p, $date, $sexe, $taille, $poids, $email, $mdp){
        $this->idUtilisateur = -1;
        $this->nom = $n;
        $this->prenom = $p;
        $this->date_naissance = $date;
        $this->sexe = $sexe;
        $this->taille = $taille;
        $this->poids = $poids;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function getId(): int { return $this->idUtilisateur; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getDate_naissance(): string { return $this->date_naissance; }
    public function getSexe(): string { return $this->sexe; }
    public function getTaille(): int { return $this->taille; }
    public function getPoids(): int { return $this->poids; }
    public function getEmail(): string { return $this->email; }
    public function getMDP(): string { return $this->mdp; }

    public function setId(int $i): void { $this->idUtilisateur = $i; }
    public function setNom(string $n): void { $this->nom = $n; }
    public function setPrenom(string $p): void{ $this->prenom = $p; }
    public function setDate_naissance(string $d): void { $this->date_naissance = $d; }
    public function setSexe(string $s): void { $this->sexe = $s; }
    public function setTaille(int $t): void { $this->taille = $t; }
    public function setPoids(int $p): void { $this->poids = $p; }
    public function setEmail(string $e): void { $this->email = $e; }
    public function setMDP(string $m): void { $this->mdp = $m; }



    public function  __toString(): string { return $this->idUtilisateur. " ".$this->nom. " ". $this->prenom." ". $this->date_naissance." ". $this->sexe." ". $this->taille." ". $this->poids." ". $this->email." ". $this->mdp; }
}
?>