<?php

    class mydb extends SQLite3 {

        function __construct(){
            $this->open('./login.db');
        }

        function addUser($user,$pass){
            return $this->exec("insert into UserLogin (name,password) VALUES ('$user','$pass')");
        }

        function close(){
            $this->close();
        }
    }
    
    $conn = new mydb();
    
    if($conn){
            
        $user = $_POST['userName'];
        $pass = $_POST['password'];
        
        $status = $conn->addUser($user,$pass) ? 'success' : 'error';
        
        print_r($status);
    }

    /*
    $res = $db.exec('select * from UserLogin');
    var_dump($res->fetchArray());
    https://www.php.net/manual/en/sqlite3.open.php
    */

?>