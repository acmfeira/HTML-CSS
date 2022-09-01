<?php

    class myDB extends SQLite3 {

        function __construct(){
            $this->open('dataBase.db');
        }

        function addUser($firstName,$lastName,$address,$cpf,$birthDate){
            $birthDate_ = date('Y-m-d',strtotime($birthDate));

            return $this->exec("insert into userData (firstName,lastName,address,cpf,dataNasc) VALUES ('$firstName','$lastName','$address','$cpf','$birthDate_')");
            
        }

        function verifyUser($userName,$cpf){
            

        }

    }

    $conn = new myDB();

    if($conn){
        if(isset($_POST)){            
            if(!$conn->verifyUser($userName,$cpf)){
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $cpf = $_POST['cpf'];
                $address = $_POST['address'];
                $birthDate = $_POST['birthDate'];
                $result = $conn->addUser($firstName,$lastName,$address,$cpf,$birthDate);
                print_r($result);
            }
        }
    }

    /*
    $res = $db.exec('select * from UserLogin');
    var_dump($res->fetchArray());
    https://www.php.net/manual/en/sqlite3.open.php
    */

?>