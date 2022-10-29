<?php 

    class Dish {
        
        public $Id;
        public $Restaurant;
        public $Name;
        public $Price;
        public $Type;
        
        public function __construct($Id,$Restaurant, $Name, $Price, $Type)
        {
            $this->Id = $Id;
            $this->Restaurant = $Restaurant;
            $this->Name = $Name;
            $this->Price = $Price;
            $this->Type = $Type;
        }
    }

?>