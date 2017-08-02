<?php 
//delete by id


    if(isset($_POST["dlt"])&&isset($_POST["empId"])){

    $con = new conn();

     $emp=$con->getFromDB('SELECT * FROM __employee WHERE emp_id=:id',['id' =>$_POST["empId"]]);
        if($emp['emp_id']==$_POST["empId"]){

             $con->ChnageDB('DELETE  FROM  __employee  WHERE emp_id =:id',['id' =>$_POST["empId"]]);
         }
        else{
              echo "no id found";
         }
         
    }
?>