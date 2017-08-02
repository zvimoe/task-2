<?php
// update by id//




   if(isset($_POST["update"])&&isset($_POST["empId"])){
        $con = new conn();

        $emp=$con->getFromDB('SELECT * FROM __employee WHERE emp_id=:id',['id' =>$_POST["empId"]]);

        if($emp['emp_id']==$_POST["empId"]){


        $con->ChnageDB('UPDATE __employee  SET emp_name = :name, start_date = :dat1  WHERE emp_id =:id',['id' =>$_POST["empId"],'dat1' =>$_POST["date"],'name' =>$_POST["name"]]);
         }
        else{
             echo "no id found";
         
         }
   }
?>