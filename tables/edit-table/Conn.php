<?php

class Conn
{
    protected string $db = "mysql";
    protected string $host = "localhost";
    protected int $port = 3306;
    protected string $dbname = "tabelaeditavel";
    protected string $user = "root";
    protected string $pass = "";
    protected object $connection;

    public function connectDb()
    {
        try{
            $this->connection = new PDO($this->db . ":host=". $this->host . ";port=" . $this->port. ";dbname=". $this->dbname, 
            $this->user, $this->pass);
            return $this->connection;
        }catch(PDOException $err){
            die("Não foi possivel se conectar, tente novamente mais tarde");
        }
    }
}

?>