<?php
 // connection to data base //
 class conn{
    private $host = '127.0.0.1';
        private $db   = 'northwind';
        private $user = 'root';
        private $pass = '';
        private $charset = 'utf8';
        private $dsn;
        private $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
       
        public function __construct() {
            $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        }
  


// get  employee from adta base //

    public function getFromDB($quary,$exct){

            $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        
            $stmt = $pdo->prepare($quary);
            $stmt->execute($exct);
            $emp=$stmt->fetch();
            return $emp;
            }
    

 // add employee or delete or update to the date base//

    public function ChnageDB($quary,$exct){

           $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
         
            $stmt = $pdo->prepare($quary);
            $stmt->execute($exct);
                        
    }
     
    //get all employees//

    public function justQuary($quary){

            $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);

            $stmt = $pdo->query('SELECT * FROM __employee ');
            return $stmt;
      
        }
 }


?>
   