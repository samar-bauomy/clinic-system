<?php
    class Database
    {
        var $conn;
        function __construct()
        {
           $this->conn=mysqli_connect("mysql5044.site4now.net","a6e6f6_clinic","samar123","db_a6e6f6_clinic");
           // $this->conn=mysqli_connect("localhost","root","","clinic-system");
        }
    //To Insert- Update - delete 
        function RunDML($statment)
        {
            if(!mysqli_query($this->conn,$statment))
                {
                    return  mysqli_error($this->conn);
                }
            else
                return "ok";
        }
    //to search select
      function GetData($select)
      {
        $result= mysqli_query($this->conn,$select);
        return $result;
      }
    }
?>