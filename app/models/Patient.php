<?php
class Patient{
    private $id;
    private $name;
    private $gender;
    public function __construct($id,$name,$gender){
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
    }
    public function getId(){
        return $this->id;
    }
    public function getname(){
        return $this->name;
    }
    public function getgender(){
        return $this->gender;
    }
    public function setname($name){
        $this->name = $name;
    }
}