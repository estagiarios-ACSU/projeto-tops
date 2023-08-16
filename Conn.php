<?php

class Conn
{
    public string $db = "mysql";
    public string $host = "localhost";
    public int $port = 3306;
    public string $dbname = "curso_php";
    public string $user = "root";
    public string $pass = "";
    public object $connection;

    public function connectDb()
    {
        try{
            $this->connection = new PDO($this->db . ":host=". $this->host . ";port=" . $this->port. ";dbname=". $this->dbname, 
            $this->user, $this->pass);
            // echo "conect ado";
            return $this->connection;
        }catch(PDOException $err){
            die("Não foi possivel se conectar, tente novamente mais tarde");
        }
    }
}

?>