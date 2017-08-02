<?php
    // get emloyee by id


   if(isset($_POST["empId"])&&isset($_POST["getEmp"])){
    $con = new conn();
    $emp=$con->getFromDB('SELECT * FROM __employee WHERE emp_id=:id',['id' =>$_POST["empId"]]);
    if($emp['emp_id']==$_POST["empId"]){

        echo $emp['emp_name'].$emp['start_date'];   
    }
    else{
        echo "no id found";
    }
   }
    ?>
