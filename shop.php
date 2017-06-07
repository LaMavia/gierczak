<?php
    class Shopping
    {
        //variables
        public $pointsFromBase;
        public $pointsInGame = 100;
        public $upgradeLvl;
        private $maxUpgradeLvl;
        //functions
        public function __construct()
        {
            $this->pointsFromBase = $_SESSION['points'];
        }
        public function buyUbgrade($upgradeCost)
        {
            $this->pointsInGame = $this->pointsInGame - $upgradeCost;
            if($this->maxUpgradeLvl == 100)
            {
                echo "You achieved max lvl for this item !";
            }
            else
            {
                $this->upradeLvl = $this->upgradeLvl + 1;
            }
        }
    }
?>