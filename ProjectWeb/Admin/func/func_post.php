<?php 

    function getPost(){

        global $con;
        // $sql="SELECT `p.Post_id`,`p.Description`,`u.name`,`c.Category` from `post p` INNER join `category c` on `p.Category_id`=`c.category_id` INNER join `users u` on `u.id`=`p.User_id`";   
        $sql="SELECT p.Post_id,p.Description,u.name,c.Category from post p INNER join category c on p.Category_id=c.category_id INNER join users u on u.id=p.User_id";
        $result=$con->query($sql)->fetchAll();
        return $result;   
    }
    function delete_post($id){
        global $con;
        //$sql=DB::delete('delete tbl_user where id = ?', [$id]);
        $sql="DELETE FROM `post` WHERE `Post_id`=$id";
        $result=$con->exec($sql);
        return (bool)$result;
    }


?>