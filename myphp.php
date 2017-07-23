<?php
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



 if(isset($_POST["empId"])&&isset($_POST["getEmp"])){


    $stmt = $pdo->prepare('SELECT * FROM __epmployee WHERE emp_id=:id');
    $stmt->execute(['id' =>$_POST["empId"]]);
    $emp=$stmt->fetch();


    echo $emp['emp_name'].$emp['start_date'];

    }
    else if(isset($_POST["add"])&&isset($_POST["name"])&&isset($_POST["date"])){
        

        $statement = $pdo->prepare("INSERT INTO __epmployee(emp_name,start_date)
    VALUES(:fname, :adte)");
    $statement->execute(array(
    "fname" => $_POST["name"],
    "adte" => $_POST["date"]));
    }
    else if(isset($_POST["delete"])&&isset($_POST["empId"])){
         $stmt = $pdo->prepare('DELETE FROM  __epmployee  WHERE emp_id =:id');
          $stmt->execute(['id' =>$_POST["empId"]]);
         

       };

  





?>
   