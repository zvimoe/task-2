<?php   // add employee to the table
      

     if(isset($_POST["add"])&&isset($_POST["name"])&&isset($_POST["date"])){

    $con = new conn();

    $emp=$con->getFromDB( 'SELECT * FROM __employee WHERE emp_name=:name', ['name' =>$_POST["name"]]);
        if($emp['emp_name']!=$_POST["name"]){

            $con->ChnageDB("INSERT INTO __employee(emp_name,start_date)VALUES(:fname, :adte)",["fname" => $_POST["name"],"adte" => $_POST["date"]]);
        }
        else{
            echo "name already exsits";
            }
     }
?>