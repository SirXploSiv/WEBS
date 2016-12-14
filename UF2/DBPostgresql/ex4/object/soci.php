<?php
    # http://mikeangstadt.name/projects/getter-setter-gen/
    class Soci {

        private $codSoci;
        private $login;
        private $password;
        private $dni;
        private $nom;
        private $cognoms;
        private $data_naixement;
        private $adreca;
        private $telefon;
        private $sexe;

        public function __construct($codSoci,$login,$password,$dni, $nom, $cognoms,$data_naixement,$adreca,$telefon,$sexe) {
            $this->codSoci = $codSoci;
            $this->login = $login;
            $this->password = $password;
            $this->dni = $dni;
            $this->nom = $nom;
            $this->cognoms = $cognoms;
            $this->data_naixement = $data_naixement;
            $this->adreca = $adreca;
            $this->telefon = $telefon;
            $this->sexe = $sexe;
        }

        public function getCodSoci(){
		    return $this->codSoci;
        }

        public function setCodSoci($codSoci){
            $this->codSoci = $codSoci;
        }

        public function getLogin(){
            return $this->login;
        }

        public function setLogin($login){
            $this->login = $login;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function getNom(){
            return $this->nom;
        }

        public function setNom($nom){
            $this->nom = $nom;
        }

        public function getCognoms(){
            return $this->cognoms;
        }

        public function setCognoms($cognoms){
            $this->cognoms = $cognoms;
        }

        public function getData_naixement(){
            return $this->data_naixement;
        }

        public function setData_naixement($data_naixement){
            $this->data_naixement = $data_naixement;
        }

        public function getAdreca(){
            return $this->adreca;
        }

        public function setAdreca($adreca){
            $this->adreca = $adreca;
        }

        public function getTelefon(){
            return $this->telefon;
        }

        public function setTelefon($telefon){
            $this->telefon = $telefon;
        }

        public function getSexe(){
            return $this->sexe;
        }

        public function setSexe($sexe){
            $this->sexe = $sexe;
        }

    }

 ?>