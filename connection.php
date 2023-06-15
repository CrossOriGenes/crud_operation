<?php
	
		$serverName = "localhost";
        $userName = "root";
        $password = "";
        $DBName = "studentdb";

        $conn = mysqli_connect($serverName, $userName, $password, $DBName);
        
        if($conn){
            //echo "Test successful...";
        }else{
            echo "Test unsuccessful...".mysqli_connect_error();
        } 
?>
