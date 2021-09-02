<?php

ob_start();
include_once "Operations.php";
include_once "Database.php";

class staff extends Database implements Operations
{
   var $id;
   var $name;
   var $job;
   var $password;
   var $phone;
   var $email;
 
  
   
  

   public function getid(){
       return $this->cid;
   }
   public function setid($value){
       $this->tid=$value;
   }
   public function getname(){
    return $this->name;
    }
    public function setname($value){
        $this->name=$value;
    }
    public function getjob(){
        return $this->job;
    }
    public function setjob($value){
        $this->job=$value;
    }
    public function getpassword(){
        return $this->password;
    }
    public function setpassword($value){
        $this->password=$value;
    }
    
    public function getphone(){
        return $this->phone;
    }
    public function setphone($value){
        $this->phone=$value;
    }
    
    public function getemail(){
        return $this->email;
    }
    public function setemail($value){
        $this->email=$value;
    }
    
    
    
   

    public function login()
    {
        return parent::GetData("select * from staff where (phone='".$this->getphone()."' or name ='".$this->getname()."') and password='".$this->getpassword()."'");
    }

    public function Add(){
        return parent::RunDML("insert into staff values(Default,'".$this->getname()."','".$this->getjob()."','".$this->getpassword()."','".$this->getphone()."')");
    }
    public function Update(){
        return parent::RunDML("update staff set name='".$this->getname()."',job='".$this->getjob()."',password='".$this->getpassword()."',phone='".$this->getphone()."')");
    }
    public function Delete(){
        return parent::RunDML("delete from staff where id='".$_SESSION["id"]."'");

    }
    public function GetAll(){
                return parent::GetDATA("select * from staff where id='".$_SESSION["id"]."'");
    }


    public function GetByEmail(){
        return parent::GetData("select * from staff where email='".$this->getemail()."' or phone='".$this->getphone()."'");
    }
}

?>