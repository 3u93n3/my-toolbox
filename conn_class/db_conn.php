<?php

class Db_conn
{
    protected $dsn, $user, $pass, $pdo;
    public $err;      

    public function __construct($config){
        $this->dsn = "mysql:host=" . $config["host"] . ";dbname=" . $config["db"] . ";charset=" . $config["char"];        
        $this->user = $config["user"];
        $this->pass = $config["pass"];
        $this->opt = $config["opt"];
    }

    private function set_connection()
    {
        try{
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        }catch(PDOException $e){
            $this->err = $e->getMessage();
        }
    }

    public function get_pdo(){        
        if(isset($this->pdo)){
            return $this->pdo;
        }else{
            $this->set_connection();
            return $this->pdo;
        }
    }

    public function __destruct(){
        unset($this->pdo);
    }
}