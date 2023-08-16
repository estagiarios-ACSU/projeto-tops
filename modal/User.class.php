<?php

include_once "Conn.php";

class User extends Conn{

    //Nesse bloco,além de iniciar o construtor dessa classe também inicia o da classe pai.
    public function __construct($email,$password,$dbname){
        parent::__construct($dbname);
        $this->email = $email;
        $this->password = $password;
    }

    public function getLoginAutentication($table){

        //Seleciona todos os dados da tabela.
        $cmd = "SELECT * FROM $table";
        $query = $this->connection->query($cmd);
        
        $signed = False;

        //Percorre os dados.
        foreach($query as $key){
            //verifica se nos campos 'email' e 'senha' tem um dado igual os dos atributos.
            if($key['email'] == $this->email && $key['senha'] == $this->password){
                $signed = True;
            }
        }
        return $signed;
    }
}

?>
