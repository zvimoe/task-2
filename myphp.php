<?php
 // connection to data base
  $host = '127.0.0.1';
    $db   = 'northwind';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);


// get emloyee by id
 if(isset($_POST["empId"])&&isset($_POST["getEmp"])){
     
    $stmt = $pdo->prepare('SELECT * FROM __employee WHERE emp_id=:id');
    $stmt->execute(['id' =>$_POST["empId"]]);
    $emp=$stmt->fetch();
    if($emp['emp_id']==$_POST["empId"]){

    echo $emp['emp_name'].$emp['start_date'];

    }
    else{
        echo "no id found";
    }
 }
    // add employee to the table


 else if(isset($_POST["add"])&&isset($_POST["name"])&&isset($_POST["date"])){
         $stmt = $pdo->prepare('SELECT * FROM __employee WHERE emp_name=:name');
         $stmt->execute(['name' =>$_POST["name"]]);
         $emp=$stmt->fetch();
       if($emp['emp_name']!=$_POST["name"]){

        $statement = $pdo->prepare("INSERT INTO __employee(emp_name,start_date)
                    VALUES(:fname, :adte)");
                    $statement->execute(array(
                    "fname" => $_POST["name"],
                   "adte" => $_POST["date"]));
       }
        else{
            echo "name already exsits";
        } 
    }
    //delete by id

  else if(isset($_POST["dlt"])&&isset($_POST["empId"])){

       $stmt = $pdo->prepare('SELECT * FROM __employee WHERE emp_id=:id');
         $stmt->execute(['id' =>$_POST["empId"]]);
         $emp=$stmt->fetch();
         if($emp['emp_id']==$_POST["empId"]){

         $stmt = $pdo->prepare('DELETE  FROM  __employee  WHERE emp_id =:id');
          $stmt->execute(['id' =>$_POST["empId"]]);
           }
         else{
              echo "no id found";
         } 
       }
    //update employee by id

  else if(isset($_POST["update"])&&isset($_POST["empId"])){

         $stmt = $pdo->prepare('SELECT * FROM __employee WHERE emp_id=:id');
         $stmt->execute(['id' =>$_POST["empId"]]);
         $emp=$stmt->fetch();
         if($emp['emp_id']==$_POST["empId"]){

            $stmt = $pdo->prepare('UPDATE __employee  SET emp_name = :name, start_date = :dat1  WHERE emp_id =:id');
            $stmt->execute(['id' =>$_POST["empId"],'dat1' =>$_POST["date"],'name' =>$_POST["name"]]);
         }
         else{
              echo "no id found";
         }
        }
    //get all employees
  else if(isset($_POST["all"])){
           $stmt = $pdo->query('SELECT * FROM __employee ');
          
        foreach ($stmt as $row)
            {
                echo"id: ".$row['emp_id']. ", name: " .$row['emp_name'].", start date: ".$row['start_date']."<br>";
            }

   //error in connection with html
        }
 else{
            echo "error;";
        };


?>
   