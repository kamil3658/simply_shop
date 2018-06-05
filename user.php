<?php
class User {
    private $id;
    private $login;
    private $construct;
    
    public function __construct($anonymous = true) {
        if($anonymous == true) {
            $this->id = 0;
            $this->login = '';
        }
        $this->construct = true;
        
        
    }
}

?>