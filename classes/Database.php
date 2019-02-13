<?php
    class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '123456';
        private $dbname = 'myblog';

        //handler
        private $dbh;
        private $error;
        private $stmt;

        public function __construct(){
            //set dsn
            $dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
            //set pdo options
            $options = array(
                PDO::ATTR_PERSISTENT => TRUE,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //create new PDO
            try {
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            } catch(PDOEception $e){
                $this->error = $e->$getMessage();
            }
        }

    }