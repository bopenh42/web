<?php
    function getUser(){

        global $con;
        $sql="select * from `tbl_users`";
        $result=$con->query($sql)->fetchAll();
        return $result;   
    }
    function delete_user($id){
        global $con;
        //$sql=DB::delete('delete tbl_user where id = ?', [$id]);
        $sql="DELETE FROM `tbl_users` WHERE `id`=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }
    function check_user($username){
        global $con;
        $sql="SELECT * FROM `tbl_users` WHERE `name`='".$username."'";
        $result=$con->query($sql)->fetchAll();
        // var_dump($result);
        // die();
        return (bool) count($result);
    }
    function add_user($username,$passsword,$role){
        global $con;
        $sql="INSERT INTO `tbl_users` (`name`,`password`,`Role`) VALUES ('".$username."','".$passsword."','".$role."')";
        $result=$con->exec($sql);
        return (bool)$result;
    }
    function login($username,$passsword){
        global $con;
        $sql="SELECT * FROM `tbl_users` WHERE `name`='".$username."' AND `password`='".$passsword."'";
        $result=$con->query($sql)->fetchAll();
        // var_dump($result);
        // die();
        if(count($result)==1){
            return $result[0];
        }
        return false;
    }

?>