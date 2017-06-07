<?php
    class Shoping
    {
        //variables
        public $pointsFromBase;
        private $pointsInGame = 100;
        private $upgradeLvl;
        //functions
        public function __construct()
        {
            $this->pointsFromBase = $_SESSION['points'];
        }
        public function buyUbgrade($upgradeCost)
        {
            $this->pointsInGame = $this->pointsInGame - $upgradeCost;
            $this->upradeLvl++;
        }
    }
?>