<?php

class User{

    //Nesse bloco,além de iniciar o construtor dessa classe também inicia o da classe pai.
    public function __construct($email,$password){

        $this->email = $email;
        $this->password = $password;
    }

    public function connectDatabase($dbname,$user,$password){
        $this->database = new PDO("mysql:host=localhost;dbname=$dbname", $user, $password);
    }

    public function getLoginAutentication($table){

        //Seleciona todos os dados da tabela.
        $cmd = "SELECT * FROM $table";
        $query = $this->database->query($cmd);
        
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