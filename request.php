<?php
class userRequest {
    public $browser;
    public $ip;
    public $info;
    
    public function __construct() {
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->info = md5($this->browser.$this->ip."gftt");
    }
    
    public function getIp() {
        return $this->ip;
    }
    
    public function getBrowser() {
        $agent = substr($this->browser, 0, 128);
        return $agent;
    }
    
    public function getInfo() {
        return $this->info;
    }
    
    
    
    
    
}






?>