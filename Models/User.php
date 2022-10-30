<?php 

    class User {
        
        public $Id;
        public $Name;
        public $Email;
        public $Password;
        public $Role;
        public $Cart;

        public function __construct($Name, $Email, $Password, $Role, $Cart) 
        {
            $this->Name = $Name;
            $this->Email = $Email;
            $this->Password = $Password;
            $this->Role = $Role;
            $this->Cart = $Cart;
        }

    }
?>