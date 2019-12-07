<?php 

    function getCategory(){

        global $con;
        $sql="SELECT * FROM `category`";
        $result=$con->query($sql)->fetchAll();
        return $result;   
    }
    function delete_Category($id){
        global $con;
        $sql="DELETE FROM `category` WHERE `category_id`=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }
    function check_category($categoryname){
        global $con;
        $sql="SELECT * FROM `category` WHERE `Category`='".$categoryname."'";
        $result=$con->query($sql)->fetchAll();
        // var_dump($result);
        // die();
        return (bool) count($result);
    }
    function add_category($categoryname){
        global $con;
        $sql="INSERT INTO `category` (`Category`) VALUES ('".$categoryname."')";
        $result=$con->exec($sql);
        return (bool)$result;
    }


?>