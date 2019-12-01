<?php
    $con='';
    function db_connection(){
        $dsn='mysql:dbname=dbWebsite;host=127.0.0.1';
        $user='root';
        $password='';
        $option=array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
        try{
            global $con;
            $con=new PDO($dsn,$user,$password);
        }catch(PDOExcepiton $e){
            echo 'Connection failed'. $e->getMessage();
        }
    }



?>