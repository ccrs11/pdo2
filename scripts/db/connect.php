<?php 
namespace App;

class connect extends credentials{
    protected $con;
    function __construct(private $dsn="mysql", private $port = 3306)
    {
        parent::__construct();
        //echo "Hola mundo";
        
        try {
            $this->con=new \PDO( $this->dsn.":host=".$this->__get('host').";dbname=".$this->__get('dbname').";user=". $this->username.";password=".$this->__get('password').";port=". $this->port);
            //print_r("Conexión establecida");
        }
        catch (\PDOException $e) 
        {
            echo $e->getMessage();
        }            

    }
}
?>