<?php
        //get all employees//


   if(isset($_POST["all"])){
       $con = new conn();

        $stmt=$con->justQuary('SELECT * FROM __employee');
            foreach ($stmt as $row)
            {
                echo"id: ".$row['emp_id']. ", name: " .$row['emp_name'].", start date: ".$row['start_date']."<br>";
            }
    }  
   
?>